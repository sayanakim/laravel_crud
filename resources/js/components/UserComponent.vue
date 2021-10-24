<template>
    <div>
        <h2 class="text-center">Сотрудники</h2><br/>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Дата рождения</th>
                    <th>Должность</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.birthday }}</td>
                    <td>{{ user.position }}</td>
                    <td>
                        <div role="group">
                            <router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-success m-1">Редактировать</router-link>
                            <button class="btn btn-danger m-1" @click="deleteUser(user.id)">Удалить</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/users/')
            .then(response => {
                this.users = response.data;
            });
    },
    methods: {
        deleteUser(id) {
            this.axios
                .delete(`http://localhost:8000/api/users/${id}`)
                .then(response => {
                    let i = this.users.map(data => data.id).indexOf(id);
                    this.users.splice(i, 1)
                });
        }
    }
}
</script>
