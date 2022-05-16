<template>
  <div>
    <button @click="startCaptureSponsor" class="btn btn-warning">CAPTURE PHOTO</button>
    <button @click="takePictureSponsor()" id="saveBtnSponsor" class="btn btn-primary">
      SAVE
    </button>
    <button @click="retakeCaptureSponsor" id="retakePicSponsor" class="btn btn-danger">
      RETAKE
    </button>
    <video ref="video" id="streamSectionSponsor" @canplay="initCanvasSponsor()">
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
    startCaptureSponsor() {
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
    retakeCaptureSponsor() {
      let vidSecSponsor = document.getElementById('streamSectionSponsor')
      let saveButtonSponsor = document.getElementById('saveBtnSponsor')
      saveButtonSponsor.style.display = 'block'
      vidSecSponsor.style.display = 'block'
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
    takePictureSponsor() {
      let vidSecSponsor = document.getElementById('streamSectionSponsor')
      let retakeOpt = document.getElementById('retakePicSponsor')
      let saveButtonSponsor = document.getElementById('saveBtnSponsor')
      saveButtonSponsor.style.display = 'none'
      retakeOpt.style.display = 'block'
      vidSecSponsor.style.display = 'none'
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
    initCanvasSponsor() {
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
  mounted() {
    this.canvas = this.$refs.canvas
    this.video = this.$refs.video
  },
}
</script>
<style>
#streamSectionSponsor {
  width: 100%;
  height: 300px;
}
#retakePicSponsor {
  display: none;
}
</style>
