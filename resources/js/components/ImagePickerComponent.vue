<template>
    <div class="ImagePicker">
        <div class="form-group text-center">
            <div class="files position-relative">
                <div id="files-row" class="img-horizontal-scroll position-relative">

                    <div class="img-support" id="file-box">
                        <label class="fa fa-plus fa-2x" for="img-support-input"></label>
                        <input type="file" accept="image/*" id="img-support-input" class="d-none" @change="addFile"
                               multiple>
                    </div>
                    <div v-for="(data,index) in images">
                        <div class="img-support position-relative">
                            <img class="img-support-inner" :src="data.file" alt="">
                            <img src="/front/images/partners/remove.png" :id='index'
                                 @click="removeFile(index)" class="img-support-remove">
                        </div>
                    </div>
                    <div v-for="image in savedImages">
                        <div class="img-support position-relative">
                            <img class="img-support-inner" :src="'/' + image.image_path" alt="">
                            <img src="/front/images/partners/remove.png" :id='image.id'
                                 @click="removeExistingFile(image)" class="img-support-remove">
                        </div>
                    </div>

                </div>
            </div>
            <label class="text-primary" for="img-support-input">
                Добавить дополнительные фото
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImagePickerComponent",
        data() {
            return {
            }

        },
        props: {
            ['images']: {
                type: Array,
                default() {
                    return [];
                }
            },
            savedImages: Array,
        },
        watch: {
            images: function (newVal, oldVal) {
                console.log('Prop changed: ', newVal, ' | was: ', oldVal)
            }
        },

        methods: {
            addFile: function (event) {
                var input = event.target;
                var filesRow = document.getElementById('files-row');
                const images = this.images;

                if (input.files && input.files.length > 0) {
                    for (var i = 0; i < input.files.length; i++) {

                        (function () {
                            const reader = new FileReader();
                            var file = input.files[i];
                            reader.onload = function (e) {
                                images.push({
                                    file: e.target.result,
                                    data: file,
                                });
                            };
                            reader.readAsDataURL(file);
                        })();
                    }

                }

                this.$emit('ImagesData', images);
            },
            removeFile: function (id) {
                const images = this.images;
                images.splice(id, 1);
                this.$emit('ImagesData', images);
            },

            removeExistingFile: function (image) {
                const images = this.savedImages;
                images.splice(images.findIndex(function (i) {
                    return i.id === image.id;
                }), 1);
                this.$emit('RemovedImage', image);
            }

        },

    }
</script>

<style>
    .img-support {
        width: 130px;
        height: 130px;
        background: #FAFAFA;
        border: 1px solid #E0E0E0;
        box-sizing: border-box;
        border-radius: 5px;
        display: inline-block;
        margin: 20px 10px;
    }

    .img-support > label {
        width: 130px;
        height: 130px;
        line-height: 130px;
        color: #E0E0E0;
    }

    .img-support-inner {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 5px;
        display: inline-block;
    }

    .img-support-remove {
        position: absolute;
        right: 0;
        top: 0;
        cursor: pointer;
    }

    .img-horizontal-scroll {
        overflow: scroll;
        display: flex;
        flex-wrap: nowrap;
        justify-content: flex-start;
        align-items: flex-start;
        max-width: 100%;
    }

</style>
