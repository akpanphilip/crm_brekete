<template>
  <div>
    <button @click="startCapture" class="btn btn-warning">CAPTURE DRIVER PHOTO</button>
    <button @click="takePicture()" id="saveBtn" class="btn btn-primary">
      SAVE
    </button>
    <button @click="retakeCapture" id="retakePic" class="btn btn-danger">
      RETAKE
    </button>
    <video ref="video" id="streamSection" @canplay="initCanvas()">
      STREAM AVAILABLE
    </video>
    <canvas ref="canvas" style="display: none;" />
  </div>
</template>
<script>
export default {
  mounted() {
    this.canvas = this.$refs.canvas
    this.video = this.$refs.video
  },
  methods: {
    startCapture() {
      navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then((stream) => {
          this.video.srcObject = stream
          this.video.play()
        })
        .catch((error) => {
          console.log(error)
        })
    },
    retakeCapture() {
      let vidSec = document.getElementById('streamSection')
      let saveButton = document.getElementById('saveBtn')
      saveButton.style.display = 'block'
      vidSec.style.display = 'block'
      navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then((stream) => {
          this.video.srcObject = stream
          this.video.play()
        })
        .catch((error) => {
          console.log(error)
        })
    },
    takePicture() {
      let vidSec = document.getElementById('streamSection')
      let retakeOpt = document.getElementById('retakePic')
      let saveButton = document.getElementById('saveBtn')
      saveButton.style.display = 'none'
      retakeOpt.style.display = 'block'
      vidSec.style.display = 'none'
      let context = this.canvas.getContext('2d')
      context.drawImage(
        this.video,
        0,
        0,
        this.video.videoWidth,
        this.video.videoHeight,
      )
      this.$emit('picture-taken', this.canvas.toDataURL('image/png'))
    },
    initCanvas() {
      this.canvas.setAttribute('width', this.video.videoWidth)
      this.canvas.setAttribute('height', this.video.videoHeight)
    },
  },
  data() {
    return {
      video: null,
      canvas: null,
    }
  },
}
</script>
<style>
#streamSection {
  width: 100%;
  height: 400px;
}
#retakePic {
  display: none;
}
</style>
