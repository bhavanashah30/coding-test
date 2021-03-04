<template>
    <div class="row main">
        <div class="col-2">
        </div>
        <div class="col-md-8">
            <div class="container">
                <h1>Realtor Plus</h1>
                <div class="row">
                    <div class="column">
                        <img :src="imagePath1" style="width:100%">
                    </div>
                    <div class="column">
                        <img :src="imagePath2" style="width:100%">
                    </div>
                    <div class="column">
                        <img :src="imagePath3" style="width:100%">
                    </div>
                </div>
               <p>A step closer to your dream home!<br/></p>
                <button class="btn btn-danger" @click="openForm">Contact Us Today</button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                baseUrl: process.env.MIX_APP_URL,
                imagePath1: process.env.MIX_IMAGE_PATH + '/image1.jpg',
                imagePath2: process.env.MIX_IMAGE_PATH + '/image2.jpg',
                imagePath3: process.env.MIX_IMAGE_PATH + '/image3.jpg'
            }
        },

        methods: {
            openForm() {
                window.location.href= this.baseUrl + '/info';
            }
        }

    }
</script>

<style>
    .main {
        box-sizing: border-box;
        text-align: center
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
