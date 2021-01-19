<template>
    <div class="withdrawal_content">
        <div class="processing_transactions col-12 col-md-12 col-lg-12">
            <h1 class="mb-4">На обработке</h1>
            <div class="transaction d-flex justify-content-between p-3 mb-3">
                <div class="course_tr d-flex align-items-center justify-content-between">
                        <span class="white-circle-around" >
                        </span>
                    <div class="d-flex align-items-center ml-3">
                        <div>
                            <h1 class="text-muted">14.12.2020 | 10:23</h1>
                            <h2>Вывод 20 000 T на карту *** - **** – **** – 9347</h2>
                        </div>
                    </div>
                </div>
                <div class=" d-flex  align-items-center justify-content-center">
                    <button class="btn btn-outline-primary pr-4 pl-4 pt-3 pb-3">Отменить транзакцию</button>
                </div>
            </div>
        </div>
        <div class="processed_transactions col-12 col-md-12 col-lg-12 mt-5">
            <h1 class="mb-4">Обработано</h1>
            <div class="transaction d-flex justify-content-between p-3 mb-3">
                <div class="course_tr d-flex align-items-center justify-content-between">
                        <span class="check-circle-around" >
                            <i class="far fa-check"></i>
                        </span>
                    <div class="d-flex align-items-center ml-3">
                        <div>
                            <h1 class="text-muted">14.12.2020 | 10:23</h1>
                            <h2>Вывод <label>20 000 T</label> на карту *** - **** – **** – 9347</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transaction d-flex justify-content-between p-3 mb-3">
                <div class="course_tr d-flex align-items-center justify-content-between">
                        <span class="check-circle-around" >
                            <i class="far fa-check"></i>
                        </span>
                    <div class="d-flex align-items-center ml-3">
                        <div>
                            <h1 class="text-muted">14.12.2020 | 10:23</h1>
                            <h2>Вывод <label>20 000 T</label> на карту *** - **** – **** – 9347</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transaction d-flex justify-content-between p-3 mb-3">
                <div class="course_tr d-flex align-items-center justify-content-between">
                        <span class="check-circle-around" >
                            <i class="far fa-check"></i>
                        </span>
                    <div class="d-flex align-items-center ml-3">
                        <div>
                            <h1 class="text-muted">14.12.2020 | 10:23</h1>
                            <h2>Вывод <label>20 000 T</label> на карту *** - **** – **** – 9347</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transaction d-flex justify-content-between p-3 mb-3">
                <div class="course_tr d-flex align-items-center justify-content-between">
                        <span class="check-circle-around" >
                            <i class="far fa-check"></i>
                        </span>
                    <div class="d-flex align-items-center ml-3">
                        <div>
                            <h1 class="text-muted">14.12.2020 | 10:23</h1>
                            <h2>Вывод <label>20 000 T</label> на карту *** - **** – **** – 9347</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "WithdrawalComponent"
    }
</script>

<style scoped>
    .btn-outline-primary {
        background:white ;
        color: #F76321;
        border-color: #F76321;
    }

    .btn-outline-primary:hover {
        color: #F76321;
        background: white;
    }
    .processing_transactions h1{
        font-size:20px;
        line-height:24px;
    }
 .processing_transactions .transaction{
        background:#F76321;
    }
    /*.transaction h1{*/
    /*    font-size: 16px;*/
    /*    line-height:22px;*/
    /*    color:#F76321;*/
    /*}*/
 .processing_transactions .transaction  .course_tr h1{
        font-size: 14px;
        line-height:15px;
    }
 .processing_transactions .transaction  .course_tr h2{
        font-size: 16px;
        line-height:15px;
        color: #ffffff;
    }

    .processed_transactions h1{
        font-size:20px;
        line-height:24px;
    }
    .processed_transactions .transaction{
        background:white;
        border: 1px solid #E8E8E8;
    }
    /*.transaction h1{*/
    /*    font-size: 16px;*/
    /*    line-height:22px;*/
    /*    color:#F76321;*/
    /*}*/
    .processed_transactions .transaction  .course_tr h1{
        font-size: 14px;
        line-height:15px;
    }
    .processed_transactions .transaction  .course_tr h2{
        font-size: 16px;
        line-height:15px;
    }
    .processed_transactions .transaction  .course_tr label{
        color:#F76321;
    }
 .white-circle-around {
     /*margin-left: 5px;*/
     border-radius: 50%;
     border: 2px solid #ffffff;
     width: 30px;
     height: 30px;
     display: flex;
     justify-content: center;
     align-items: center;
     color: #ffffff;
     background:  #ffffff;
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
</style>
