<template>
    <div id="dropdown-user"  class="dropdown dropdown-extended fl-right">

        <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <h3 id="account" class="fl-right"> ({{ notiCount }}) <i class="fa fa-bell"></i></h3>
        </button>
        <ul class="dropdown-menu" style="border:none; !important; border-color: white; ">
            <li v-if="hasNoti === true"
                    v-for="notification in notifications"
                    :key="notification.id">
                    <a href="#" style="color: black;"
                       @click.prevent="markAsRead(notification)"
                        :title="notification.data.message">{{notification.data.message}}</a>
            </li>
            <li  v-if="hasNoti === false">
                <!--<span></span>-->
                <a style="color: black;">Không có thông báo !</a>
            </li>
        </ul>

    </div>
</template>
<script>
    // var a = document.getElementById('a');
    export default {
        mounted() {
            Echo.private('App.User.' + window.App.user.id)
                .notification((notification) => {
                    this.notifications.push(notification)
                    toastr.success('Có đơn hàng vừa được đặt !')
                });
        },
        data() {
            return {
                notifications: false
            }
        },
        computed :{
            notiCount() {
                return this.notifications.length
            },
            hasNoti() {
                return this.notifications.length > 0
            }
        },
        created()
        {
            this.fetch()
        },
        methods : {
            fetch() {
                axios.get(window.App.baseUrl + '/api/notifications').then(res => {
                   this.notifications = res.data
                });
            },
            markAsRead(notification)
            {
                axios.delete(window.App.baseUrl + '/api/notifications/' + notification.id)
                window.location.href = notification.data.link
            }
        }
    }
</script>

<style scoped>

</style>