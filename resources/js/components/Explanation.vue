<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome to the Airplane Auction Demo</div>

                    <div class="card-body">
                        This is a basic demo.  This is a page made from the stock Vue template that is being used just to utilize Vue Router.  The php laravel serves up MVC and the vue page serves up the welcome page and the explanation page via vue router.  They vue page can link to the php page via the navbar that exists on the php laravel side. The vue is rendered between that page. To get back to the welcome page, you have to hit the welcome link full webpath because the VUE router cannot talk to Laravel MVC routing.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Demo Explanation mounted.')
        }
    }
</script>
