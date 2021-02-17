<template>
    <div v-if="user.withdrawal_card_id  && user.ref_link  " class="profit_content">
        <div class="profit_header col-12 col-md-12 col-lg-12 mt-3 row">
            <div class="col-6 col-mg-6 col-lg-6 ">
                <p>Моя реферальная ссылка</p>
                <div class="ref_link_card col-12 d-flex align-items-center ">
                    <div class="d-flex align-items-center justify-content-center mr-3">
                        <h2 class=" pt-2 " >{{user.ref_link}}</h2>
                    </div>
                    <span class="copy-circle-around " v-clipboard="user.ref_link" >
                                        <i class="fal fa-copy"></i>
                    </span>
                </div>
            </div>
            <div class="col-6 col-mg-6 col-lg-6">
                <p>Карта для вывода средств</p>
                <div class="withdraw_card col-12 d-flex align-items-center ">
                    <div class="form-group credit_card pt-2 d-flex align-items-center mr-3">
                        <div class="d-flex align-items-center justify-content-center ">
                            <img class="course_image" src="/modules/front/assets/img/mastercard.png" alt="">
                        </div>
                        <label>
                            **** - **** - **** - {{user.withdrawal_card.last_four}}
                        </label>
                    </div>
                    <span class="copy-circle-around ">
                                        <i class="fal fa-plus"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="profit_analysis col-12 col-md-12 col-lg-12 mt-5 mb-5  row">
            <div class="col-6 col-mg-6 col-lg-6">
                <div class="col-12 d-flex justify-content-between pr-0 pl-0 mb-3">
                    <h1>Мой заработок</h1>
                    <h2>За последний : <div class="list"><span class="placeholder">месяц</span>
                        <ul class="list__ul">
                            <li><a href="">месяц</a></li>
                            <li><a href="">месяц</a></li>
                            <li><a href="">месяц</a></li>
                        </ul>
                    </div></h2>
                </div>
                <div class="earnings d-flex align-items-center justify-content-center text-center">
                    <h1 class="cash">125 000 Т</h1>
                </div>
            </div>
            <div class="col-6 col-mg-6 col-lg-6">
                <div class="col-12">
                    <h1>Конверсия</h1>
                </div>
                <div class="col-12 ">
                    <div class="conversion p-3 d-flex align-items-center justify-content-between ">
                        <h1>Переходов по ссылке</h1>
                        <h2>1 000</h2>
                    </div>
                    <div class="conversion  p-3 d-flex align-items-center justify-content-between">
                        <h1>Регистраций на Simple</h1>
                        <h2>500</h2>
                    </div>
                    <div class="conversion  p-3 d-flex align-items-center justify-content-between">
                        <h1>Купили подписку</h1>
                        <h2>50</h2>
                    </div>
                    <div class="conversion  p-3 d-flex align-items-center justify-content-between">
                        <h1>Конверсия в продажу</h1>
                        <h2>10%</h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="transactions_content col-12 col-md-12 col-lg-12 mt-5">
            <div class="col-12 d-flex justify-content-between mt-5">
                <h1>Транзакции</h1>
                <h2>Сортировать по: <div class="list"><span class="placeholder">популярности</span>
                    <ul class="list__ul">
                        <li><a href="">популярности</a></li>
                        <li><a href="">популярности</a></li>
                        <li><a href="">популярности</a></li>
                    </ul>
                    </div>
                </h2>
            </div>
            <div class="col-12 mt-3">
                <div class="transaction d-flex justify-content-between pt-3 pb-3">
                    <div class="course_tr d-flex justify-content-between">
                        <span class="check-circle-around" >
                                        <i class="far fa-check"></i>
                        </span>
                        <div class="d-flex align-items-center ml-3">
                            <div>
                                <h1 class="text-muted">14.12.2020 | 10:23</h1>
                                <h2>kairataskarov@gmail.com купил курс «Основы маркетинга»</h2>
                            </div>
                        </div>
                    </div>
                    <h1 class="d-flex justify-content-center align-items-center">Ваш доход: +1500 T</h1>
                </div>
                <div class="transaction d-flex justify-content-between pt-3 pb-3">
                    <div class="course_tr d-flex justify-content-between">
                        <span class="check-circle-around" >
                                        <i class="far fa-check"></i>
                        </span>
                        <div class="d-flex align-items-center ml-3">
                            <div>
                                <h1 class="text-muted">14.12.2020 | 10:23</h1>
                                <h2>kairataskarov@gmail.com купил курс «Основы маркетинга»</h2>
                            </div>
                        </div>
                    </div>
                    <h1 class="d-flex justify-content-center align-items-center">Ваш доход: +1500 T</h1>
                </div>

            </div>
        </div>

    </div>
    <div class="card-body" v-else>
        <div v-if="activated == false" class="card_content m-3 d-block align-items-center justify-content-center" >
            <div class="d-flex align-items-center justify-content-center m-3">
                 <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-exclamation-triangle"></i>
                </span>
            </div>
            <div class="text-center m-4">
                   <p>У-у-п-с!<br>
                       Это какое-то недоразумение!</p>
                   <h1>
                       Вы не являетесь участником партнерской системы Simple.
                   </h1>
                   <p>
                       Но это легко изменить. <br>
                       Активируйте партнерскую систему прямо сейчас и<br>
                       начните зарабатывать, приглашая своих друзей.<br>
                   </p>
            </div>
            <div class="form-group col-12 text-center">
                <button class="btn btn-primary pr-5 pl-5 pt-3 pb-3" @click ="activate()">Активировать</button>
            </div>
        </div>

        <div v-else-if="withdrawal == false && activated == true" class="card_content m-3 d-block align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center m-3">
                 <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-check"></i>
                </span>
        </div>
        <div class="text-center m-4">
            <p><label class="text-muted">Шаг 1</label><br>
                Замечательно!</p>
            <p>
                Теперь необходимо добавить банковскую карту,<br>
                на которую вы сможете выводить свой заработок
            </p>
            <h2 class="text-muted">Добавить карту, указанную при покупке подписки в Simple?</h2>
        </div>
        <div class="form-group credit_card col-12 d-flex align-items-center justify-content-center mt-5 mb-5">
            <div class="d-flex align-items-center justify-content-center mr-3 ">
                <img class="course_image" src="/modules/front/assets/img/mastercard.png" alt="">
            </div>
            <label>
                **** - **** - **** - {{user.withdrawal_card.last_four}}
            </label>
        </div>
        <div class="form-group col-12 text-center">
            <button class="btn btn-primary pr-4 pl-4 pt-3 pb-3" @click ="saveWithdrawal()">Использовать карту</button>
            <button class="btn btn-outline-primary pr-4 pl-4 pt-3 pb-3">Добавить новую</button>
        </div>
    </div>
        <div v-else-if="withdrawal == true && ref_link == false" class="card_content m-3 d-block align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center m-3">
                 <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-check"></i>
                </span>
            </div>
            <div class="text-center m-4">
                <p><label class="text-muted">Шаг 2</label><br>
                    Супер!</p>
                <p>
                    Теперь вам необходимо сгенерировать свою личную<br>
                    реферальную ссылку, которую вы будете отправлять своим<br>
                    друзьям и получать свой доход от их подписок на Simple.
                </p>
                <h2 class="text-muted">Придумайте названое для вашей ссылки. Например: alibeksimple</h2>
            </div>
            <div class="form-group credit_card col-12 d-flex align-items-center justify-content-center mt-5 mb-5">
                <div class="form-group col-8 d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center mr-3 ">
                        <h2 class="pt-2">Simple.com/</h2>
                    </div>
                    <input type="text" placeholder="kairat" class="form-control p-4"
                           v-model="link" required>
                </div>
            </div>
            <div class="form-group col-12 text-center">
                <button class="btn btn-primary pr-5 pl-5 pt-3 pb-3" @click ="saveLink()" :disabled="isDisable">Сохранить</button>
            </div>
        </div>
        <div v-else-if="withdrawal == true && ref_link == true && copied == false" class="card_content m-3 d-block align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center m-3">
                 <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-check"></i>
                </span>
            </div>
            <div class="text-center m-4">
                <p><label class="text-muted">Шаг 3</label><br>
                    Вы – молодец!</p>
                <p>
                    Мы уже так близки к цели! Остался последний шаг.<br>
                    Скопировать ссылку и отправить своим друзьям<br>
                    в социальных сетях. Не забудьте, порекомендовать<br>
                    свой любимый курс на Simple. :)
                </p>
                <p>
                    В дальнейшем, ваша ссылка всегда будет доступна в этом разделе
                </p>
                <h2 class="text-muted">Для копирования ссылки нажмите на кнопку справа</h2>
            </div>
            <div class="form-group credit_card col-12 d-flex align-items-center justify-content-center mt-5 mb-5">
                <div class="form-group col-8 d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center mr-3 ">
                        <h2 class="link pt-2 pl-4 pr-4" id="link">{{user.ref_link}}</h2>
                    </div>
                    <span class="copy-circle-around "  v-clipboard="user.ref_link" >
                                        <i class="fal fa-copy"></i>
                    </span>

                </div>
            </div>
            <div class="form-group col-12 text-center">
                <button class="btn btn-primary pr-5 pl-5 pt-3 pb-3" @click ="saveCopy()">Готово!</button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ProfitComponent",
        data: function () {
            return {
                withdrawal:false,
                ref_link:false,
                copied:false,
                activated:false,
                link:'',
                user:Object,
                withdrawal_card: Object
            }
            },
        mounted: function () {
            this.loadProfile();
        },

        computed: {
            isDisable: function () {
                return this.link === ''
            }
        },

        methods: {
            loadProfile: function () {
                const app = this;
                axios('/profile')
                    .then(function (resp) {
                        app.loading = true;
                        app.user = resp.data.user;
                        app.withdrawal_card = resp.data.user.withdrawal_card;
                        app.loading = false;
                    }).catch(function (resp) {
                });
            },

            activate: function () {
                if(this.user.last_four){
                    this.activated = true;
                }else{
                    toastr.error("Сначала купите курс");

                }

            },
            saveWithdrawal: function () {
                this.makeCardWithdrawal();
                this.loadProfile();
                this.withdrawal = true;
            },
            saveLink: function () {
                const app = this;
                var bodyFormData = new FormData();
                bodyFormData.append('link', this.link);
                app.loading = true;
                app.loading = false;
                axios({
                    method: 'post',
                    url: '/profile/create/ref-link',
                    data: bodyFormData,
                    headers: {'Content-Type': 'multipart/form-data'}
                })
                    .then(function (resp) {
                        app.loading = false;
                        toastr.success('Реферальная ссылка успешно сохранена!');
                    }).catch(function (resp) {
                    app.loading = false;
                });
                this.ref_link = true;
                this.loadProfile();
            },
            saveCopy: function () {
                this.copied = true;
            },
            makeCardWithdrawal() {
                const app = this;
                var bodyFormData = new FormData();
                // for (var key in this.updatedPassword) {
                //     bodyFormData.append(key, this.updatedPassword[key]);
                // }
                bodyFormData.append('id', this.user.card.id);
                app.loading = true;
                app.loading = false;
                axios({
                    method: 'post',
                    url: '/profile/create/withdrawal-card',
                    data: bodyFormData,
                    headers: {'Content-Type': 'multipart/form-data'}
                })
                    .then(function (resp) {
                        app.loading = false;
                        toastr.success('Карта успешно сохранена!');
                        // setTimeout(function (app) {
                        //     app.$router.go(app.$router.currentRoute);
                        // }, 1500, app);
                    }).catch(function (resp) {
                    app.loading = false;
                });
            }

        }
    }
</script>

<style scoped>
.card-body{
    border: 1px solid #E8E8E8;
    border-radius: 5px;
}
.card_content .read-more-circle-around {
    /*margin-left: 5px;*/
    border-radius: 50%;
    border: 2px solid #F76321;
    width: 70px;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff;
    background:  #F76321;
}
.card_content .copy-circle-around {
    /*margin-left: 5px;*/
    border-radius: 50%;
    border: 2px solid #F76321;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff;
    background:  #F76321;
    cursor: pointer;
}
.copy-circle-around {
    /*margin-left: 5px;*/
    border-radius: 50%;
    border: 2px solid #F76321;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff;
    background:  #F76321;
    cursor: pointer;
}
.check-circle-around {
    /*margin-left: 5px;*/
    border-radius: 50%;
    border: 2px solid #F76321;
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff;
    background:  #F76321;
    cursor: pointer;
}
.card_content p{
    font-size:18px;
    line-height:22px;
}
.card_content h1{
    font-size:18px;
    line-height:39px;
}
.card_content h2{
    font-size:16px;
    line-height:22px;
}

.btn-primary{
    background: #F76321;
    border-color:#F76321;
    font-size: 16px;
    line-height: 19px;
    border-radius:5px;
}
.btn-primary:hover{
    background: #F76321;
    border-color: #F76321;
}
.btn-primary:active{
    color: #fff;
    background: #F76321;
    border-color: #F76321;
    box-shadow: transparent !important;
}
.btn-primary:focus{
    box-shadow: transparent !important;

}
.btn-outline-primary {
    color: #F76321;
    border-color: #F76321;
}

.btn-outline-primary:hover {
    color: #F76321;
    background: white;
}
.credit_card{
    background: #FCFCFC;
}
.credit_card label{
    font-size:18px;
    line-height:22px;
}
.course_image{
    min-height: 35px;
    max-height: 35px;
    min-width: 100%;
    max-width: 100%;
    background: #FAFAFA;
    box-sizing: border-box;
    display: inline-block;
}
.form-control{
    border:none;
    background:white;
}
.profit_header{
    border-bottom: 1px solid #EDEDED;
}
.profit_header p{
    font-size: 16px;
    line-height:19px
}
.profit_header h2{
    font-size: 16px;
    line-height:22px
}
.withdraw_card label{
    font-size: 16px;
    line-height:19px
}
.profit_analysis h1{
    font-size: 16px;
    line-height:19px;
}
.profit_analysis h2{
    font-size: 13px;
    line-height:16px;
}
.earnings{
    background:#F76321;
    height: 200px;
    border-radius:3px;
}
.earnings h1{
    font-size: 35px;
    line-height:42px;
    color:white;
}

.list {
    display: inline-block;
    position: relative;
    margin-left: 6px;
}
.list ul {
    text-align: left;
    position: absolute;
    padding: 0;
    top: 0;
    left: 0;
    display: none;
}
.list ul .active {
    display: block;
}
.list li {
    list-style: none;
}
.list a {
    transition: all 0.4s;
    color: #050606;
    position: relative;
}
select {
    display: inline;
    border: 0;
    width: auto;
    margin-left: 10px;
    outline: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    border-bottom: 2px solid #555;
    transition: all 0.4s ease-in-out;
}
select:hover {
    cursor: pointer;
}
select option {
    border: 0;
    border-bottom: 1px  #555;
    padding: 10px;
    -webkit-appearance: none;
    -moz-appearance: none;
}

.placeholder {
    border-bottom: 2px solid;
    cursor: pointer;
}
.placeholder:hover {
    color: #888888;
}
.conversion{
    border-bottom: 1px solid #EDEDED;
}
.conversion h1{
    font-size: 14px;
    line-height:17px;
}
.conversion h2{
    font-size: 20px;
    line-height:24px;
}
.transactions_content h1{
    font-size: 16px;
    line-height:19px;
}
.transactions_content h2{
    font-size: 12px;
    line-height:14px;
}
.transaction{
    border-bottom: 1px solid #EDEDED;
}
.transaction h1{
    font-size: 16px;
    line-height:22px;
    color:#F76321;
}
.course_tr h1{
    font-size: 14px;
    line-height:15px;
}
.course_tr h2{
    font-size: 16px;
    line-height:15px;
}
</style>

