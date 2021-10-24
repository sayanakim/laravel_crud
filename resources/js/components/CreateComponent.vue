<template>
    <div>
        <h3 class="text-center">Создать сотрудника</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="createUser">
                    <div class="form-group">
                        <label>Имя</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Дата рождения</label>
                        <input type="date" class="form-control" v-model="user.birthday">
                    </div>
                    <div class="form-group">
                        <label>Должность</label>
                        <input type="text" class="form-control" v-model="user.position">
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
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
    methods: {
        createUser() {
            this.axios
                .post('http://localhost:8000/api/users', this.user)
                .then((response) => (
                    this.$router.push({ name: 'users' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>
