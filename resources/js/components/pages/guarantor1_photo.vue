<template>
  <div>
    <button @click="startCaptureGuarantor" class="btn btn-warning">
      CAPTURE PHOTO
    </button>
    <button
      @click="takePictureGuarantor()"
      id="saveBtnGuarantor"
      class="btn btn-primary"
    >
      SAVE
    </button>
    <button
      @click="retakeCaptureGuarantor"
      id="retakePicGuarantor"
      class="btn btn-danger"
    >
      RETAKE
    </button>
    <video
      ref="video"
      id="streamSectionGuarantor"
      @canplay="initCanvasGuarantor()"
    >
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
    startCaptureGuarantor() {
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
    retakeCaptureGuarantor() {
      let vidSecGuarantor = document.getElementById('streamSectionGuarantor')
      let saveButtonGuarantor = document.getElementById('saveBtnGuarantor')
      saveButtonGuarantor.style.display = 'block'
      vidSecGuarantor.style.display = 'block'
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
    takePictureGuarantor() {
      let vidSecGuarantor = document.getElementById('streamSectionGuarantor')
      let retakeOpt = document.getElementById('retakePicGuarantor')
      let saveButtonGuarantor = document.getElementById('saveBtnGuarantor')
      saveButtonGuarantor.style.display = 'none'
      retakeOpt.style.display = 'block'
      vidSecGuarantor.style.display = 'none'
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
    initCanvasGuarantor() {
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
#streamSectionGuarantor {
  width: 100%;
  height: 300px;
}
#retakePicGuarantor {
  display: none;
}
video {
  width: 100%;
  height: 100%;
}
</style>
