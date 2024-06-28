const videoContainer = document.querySelector("#videos");
const vm = new Vue({
  el: "#app",
  data: {
    userToken: "",
    roomId: "",
    roomToken: "",
    room: undefined,
    client: undefined,
  },
  computed: {
    roomUrl: function() {
      return `https://${location.hostname}doan/meeting.php?groupID=${this.roomId}`;
    }
  },
  async mounted() {
    await api.setRestToken(); // Sử dụng await nếu setRestToken là async
  },
  methods: {
    // Hàm xác thực người dùng
    login: async function() {
      const userToken = await api.getUserToken(userId);
      this.userToken = userToken;
      const client = new StringeeClient();
      client.on('authen', (result) => {
        console.log('on authen', result);
      });
      client.connect(userToken);
      this.client = client;
    },
    // Hiển thị webcam
    publishVideo: async function(screenSharing = false) {
      const localTrack = await StringeeVideo.createLocalVideoTrack(this.client, {
        audio: true,
        video: true,
        screen: screenSharing,
        videoDimensions: { width: 500, height: 500 }
      });
      
      const videoElement = localTrack.attach();
      videoContainer.appendChild(videoElement);

      const roomData = await StringeeVideo.joinRoom(
        this.client,
        this.roomToken
      );
      this.room = roomData.room;
      console.log({ roomData, room: this.room });
      
      this.room.clearAllOnMethos(); 
      
      this.room.on('addtrack', async(event) => {
        const trackInfo = event.info.track;
        if (trackInfo.serverId === localTrack.serverId) {
          return;
        }
         this.subscribeTrack(trackInfo);
      });

      this.room.on("removetrack", (event) => {
        if (!event.track) {
          return;
        }
        const elements = event.track.detach();
        elements.forEach(element => element.remove());
      });
      roomData.listTracksInfo.forEach(trackInfo => {
        this.subscribeTrack(trackInfo);
      });

      this.room.publish(localTrack);
    },

    // Tạo room id, room
    createRoom: async function() {
      const room = await api.createRoom();
      const roomToken = await api.getRoomToken(room.roomId);
      this.roomId = room.roomId;
      this.roomToken = roomToken;
      await this.login();
      await this.publishVideo();
    },

    joinRoom: async function() {
      const roomId = prompt("Dán Room ID vào đây nhé!");
      if (!roomId) {
        return;
      }
      const roomToken = await api.getRoomToken(roomId);
      this.roomId = roomId;
      this.roomToken = roomToken;
      await this.login();
      await this.publishVideo();
    },

    subscribeTrack: async function(trackInfo) {
      console.log(this.room);
      const track = await this.room.subscribe(trackInfo.serverId);
      track.on("ready", () => {
        const videoElement = track.attach();
        this.addVideo(videoElement);
      });
    },

    addVideo: function(videoElement) {
      videoContainer.appendChild(videoElement);
    }
  }
});
