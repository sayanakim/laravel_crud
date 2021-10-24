<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Дата рождения</label>
                        <input id="date" type="date"  v-model="user.birthday">
                    </div>
                    <div class="form-group">
                        <label>Должность</label>
                        <input type="text" class="form-control" v-model="user.position">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/users/${this.$route.params.id}`)
            .then((res) => {
                this.user = res.data;
            });
    },
    methods: {
        updateUser() {
            this.axios
                .patch(`http://localhost:8000/api/users/${this.$route.params.id}`, this.user)
                .then((res) => {
                    this.$router.push({ name: 'users' });
                });
        }
    }
}
</script>
