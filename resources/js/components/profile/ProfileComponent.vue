<template>
    <div class="card col-md-12 col-12">
        <div class="card-body">
            <div v-if="loading" class="text-center text-muted">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Загрузка...</span>
                </div>
            </div>
            <h1 class ="pb-2">Персональная информация</h1>
            <div class="profile-data col-md-12 col-lg-12 row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="form-control-plaintext">Имя</label>
                        <input type="text" placeholder="Кайрат" class="form-control p-4"
                               required v-model="updatedProfile.first_name">
                    </div>
                    <div class="form-group">
                        <label class="form-control-plaintext">Номер телефона</label>
                        <input type="tel"  id="phone"
                                name="phone" placeholder="+7 (777) 777 77 77" class="form-control p-4"
                               required v-model="updatedProfile.phone">
                    </div>
                    <div class="form-group">
                        <label class="form-control-plaintext">Пароль</label>
                        <input type="password" placeholder="Введите новый пароль" class="form-control p-4"
                               required v-model="updatedPassword.new_password">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="form-control-plaintext">Фамилия</label>
                        <input type="text" placeholder="Аскаров" class="form-control p-4"
                               required v-model="updatedProfile.last_name">
                    </div>
                    <div class="form-group">
                        <label class="form-control-plaintext">E-mail</label>
                        <input type="email" placeholder="kairataskaov@gmail.com" class="form-control p-4"
                               required v-model="updatedProfile.email">
                    </div>
                    <div class="form-group">
                        <label class="form-control-plaintext">Подтверждение пароля</label>
                        <input type="password" placeholder="Повторите новый пароль" class="form-control p-4"
                               required v-model="updatedPassword.new_password_confirmation">
                    </div>
                </div>
                <div class="form-group col-12 text-right">
                    <button class="btn btn-primary pr-5 pl-5 pt-3 pb-3" @click="updateProfile()" :disabled="isDisable">Сохранить изменения
                    </button>
                </div>
            </div>

        </div>
    </div>


</template>

<script>
    import SingleImagePickerComponent from '../../shared/components/SingleImagePickerComponent';
    import Inputmask from 'inputmask';


    export default {
        name: "ProfileComponent",
        components: {
            SingleImagePickerComponent
        },
        data: function () {
            return {
                user: Object,
                loading: false,
                shop: Object,
                updatedProfile: {
                    first_name: '',
                    last_name: '',
                    phone: '',
                    email:'',
                    avatar: null,
                },
                updatedPassword: {
                    old_password: '',
                    new_password: '',
                    new_password_confirmation: ''
                }


            };
        },
        mounted: function () {
            // this.loadProfile();
            var im = new Inputmask("+7 (999) 999 99 99");
            im.mask(document.getElementById('phone'));

        },
        computed: {
            isDisable: function () {
                return this.updatedProfile.first_name === ''
                    || this.updatedProfile.last_name === ''
                    || this.updatedProfile.father_name === ''
                    || this.updatedProfile.shop_name === ''
                    || this.updatedProfile.phone === ''
                    || this.updatedProfile.shop_address === ''
            },
            isDisablePassword: function () {
                if (this.updatedPassword.old_password.length > 5 && this.updatedPassword.new_password.length > 5) {
                    if (this.updatedPassword.new_password === this.updatedPassword.new_password_confirmation) {
                        return false
                    }
                }
                return true;
            },
        },
        methods: {
            // loadProfile: function () {
            //     const app = this;
            //     axios('/v3/partners/system/profile')
            //         .then(function (resp) {
            //             app.loading = true;
            //             app.user = resp.data.user;
            //             app.updatedProfile.phone = app.user.phone_number;
            //             app.updatedProfile.first_name = app.user.first_name;
            //             app.updatedProfile.last_name = app.user.last_name;
            //             app.loading = false;
            //
            //
            //         }).catch(function (resp) {
            //     });
            // },
            onChangeAvatar: function (image) {
                this.updatedProfile.avatar = image;
            },
            onChangeLogo: function (image) {
                this.updatedProfile.shop_image = image;
            },
            updatePassword() {
                const app = this;
                var bodyFormData = new FormData();
                for (var key in this.updatedPassword) {
                    bodyFormData.append(key, this.updatedPassword[key]);
                }
                app.loading = true;
                app.loading = false;
                axios({
                    method: 'post',
                    url: '/v3/partners/system/profile/password/update',
                    data: bodyFormData,
                    headers: {'Content-Type': 'multipart/form-data'}
                })
                    .then(function (resp) {
                        app.loading = false;
                        toastr.success('Пароль успешно изменен!');
                        setTimeout(function (app) {
                            app.$router.go(app.$router.currentRoute);
                        }, 1500, app);
                    }).catch(function (resp) {
                    app.loading = false;
                });
            },
            updateProfile() {
                const app = this;
                var bodyFormData = new FormData();
                for (var key in this.updatedProfile) {
                    if (key === 'avatar' || key === 'shop_image') {
                        if (this.updatedProfile[key] == null) continue;
                    }
                    bodyFormData.append(key, this.updatedProfile[key]);
                }
                app.loading = true;
                app.loading = false;
                axios({
                    method: 'post',
                    url: '/v3/partners/system/profile/update',
                    data: bodyFormData,
                    headers: {'Content-Type': 'multipart/form-data'}
                })
                    .then(function (resp) {
                        app.loading = false;
                        toastr.success('Профиль успешно изменен!');
                    }).catch(function (resp) {
                    app.loading = false;
                });
            }
        }
    }
</script>

<style scoped>
    .mgl-map-wrapper {
        height: 350px;
        position: relative;
        width: 100%;
    }

    .form-control {
        padding: 17px 10px 17px 10px
    }
    .card h1{
        font-size: 23px;
        line-height: 28px;
    }
</style>
