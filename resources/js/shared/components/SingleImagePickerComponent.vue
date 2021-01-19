<template>
    <div class="text-center">
        <!--        <div v-if="imagePath">-->
        <div v-if="product">
            <img class="img-product " :src="avatarImg"
                 alt="" onerror="this.src='/modules/clients/partners/assets/images/add.png'">
            <label class="text-primary mt-2 form-control-plaintext" for="productImgFile">{{text}}</label>
            <input type="file" class="d-none" id="productImgFile" accept="image/*"
                   @change="changeProductImage">
        </div>
        <div v-else-if="avatar">
            <img class="img-profile profile-rounded" :src="avatarImg"
                 alt="" onerror="this.src='/modules/clients/partners/assets/images/profile.svg'">
            <label class="label-success mt-2 form-control-plaintext" for="avatarImgFile">{{text}}</label>
            <input type="file" class="d-none" id="avatarImgFile" accept="image/*"
                   @change="changeAvatar">
        </div>
        <div v-else>
            <img class="img-default" :src="defaultImg" alt=""
                 onerror="this.src='/modules/clients/partners/assets/images/add_photo_alternate.svg'">
            <label class="label-success mt-2 form-control-plaintext" for="defaultImgFile">{{text}}</label>
            <input type="file" class="d-none" id="defaultImgFile" accept="image/*"
                   @change="changeImage">
        </div>
    </div>
    <!--    </div>-->
</template>

<script>
    export default {
        name: "SingleImagePickerComponent",
        props: {
            avatar: Boolean,
            product: Boolean,
            imagePath: String,
            text: String
        },
        data() {
            return {
                defaultImg: '',
                avatarImg: ''
            }
        },
        watch: {
            imagePath: function (newVal, oldVal) { // watch it
                this.defaultImg = '/' + newVal;
                this.avatarImg = '/' + newVal;

            }
        },
        methods: {
            changeImage: function (event) {
                const file = event.target.files[0];
                let url = URL.createObjectURL(file);
                this.defaultImg = url;
                this.$emit('onChange', event.target.files[0])

            },
            changeAvatar: function (event) {
                const file = event.target.files[0];
                let url = URL.createObjectURL(file);
                this.avatarImg = url;
                this.$emit('onChange', event.target.files[0])
            },
            changeProductImage:function (event) {
                const file = event.target.files[0];
                let url = URL.createObjectURL(file);
                this.avatarImg = url;
                this.$emit('onChange', event.target.files[0])
            },
        }
    }
</script>

<style scoped>
    .img-profile {
        width: 100px;
        height: 100px;
        background: #FAFAFA;
        border: 1px solid #E0E0E0;
        box-sizing: border-box;
        border-radius: 5px;
        display: block;
        margin-left: auto;
        margin-right: auto;

    }

    .img-product {
        width: 130px;
        height: 130px;
        background: #FAFAFA;
        box-sizing: border-box;
        border-radius: 5px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        object-fit: cover;

    }

    .img-default {
        min-height: 100px;
        max-height: 300px;
        min-width: 50%;
        max-width: 100%;
        background: #FAFAFA;
        border: 1px solid #E0E0E0;
        box-sizing: border-box;
        border-radius: 5px;
        display: inline-block;
    }
</style>
