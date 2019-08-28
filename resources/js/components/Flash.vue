<template>
    <div class="alert alert-info alert-flash" role="alert" v-show="show">
        {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
                body: '',
                show: false
            }
        },
        created() {
            if (this.message) {
                this.flash(this.message);
            }
            window.events.$on(
                'flash', message => this.flash(message)
                );
        },
        methods: {
            flash(message) {
                this.body = message;
                this.show = true;
                this.hide();
            },
            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>

<style>
.alert-flash {
    position: fixed;
    right: 25px;
    top: 0px;
}
.alert-info
{
    color: #fff;
    background-color: #328af1;
    border-color: #328af1;
    text-decoration: none;
    border-radius: .5rem;
    font-size: .875rem;
    padding-top: .5rem;
    padding-bottom: .5rem;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    -webkit-box-shadow: #d7e8fd 0px 4px 10px 1px;
    box-shadow: #d7e8fd 0px 4px 10px 1px;
}
.alert
{
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style> 

