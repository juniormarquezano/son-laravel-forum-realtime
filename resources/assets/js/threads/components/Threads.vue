<template>
    <div class="card blue-grey darken-1">
        <div class="card-content white-text">
            <span class="card-title">{{ title }}</span>

            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ threads }}</th>
                    <th>{{ replies }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="thread in threads_response.data" :key="thread.id">
                    <td>{{ thread.id }}</td>
                    <td>{{ thread.title }}</td>
                    <td>0</td>
                    <td><a :href="`/threads/${thread.id}`">{{ open }}</a></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">{{ newThread }}</span>
                <form @submit.prevent="save()">
                    <div class="input-field">
                        <input type="text" :placeholder="threadTitle" v-model="threads_save.title">
                    </div>
                    <div class="input-field">
                        <textarea rows="10"
                                  class="materialize-textarea"
                                  :placeholder="threadBody"
                                  v-model="threads_save.body"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn bt-red accent-2">{{ send }}</button>
                </form>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        props: {
          'title': {
            type: String,
            required: true,
          },
          'threads': {
            type: String,
            required: true
          },
          'replies': {
            type: String,
            required: true
          },
          'open': {
            type: String,
            required: true
          },
          'newThread': {
            type: String,
            required: true
          },
          'threadTitle': {
            type: String,
            required: true
          },
          'threadBody': {
            type: String,
            required: true
          },
          'send': {
            type: String,
            required: true
          }
        },
        data: () => ({
            threads_response: [],
            threads_save: {
              title: '',
              body: ''
            }
        }),
        methods: {
          save() {
            window.axios.post('/threads', this.threads_save).then(() => {
                this.getThreads()
            })
          },
          getThreads() {
            window.axios.get('/threads').then(response => {
              this.threads_response = response.data
            })
          }
        },
        mounted() {
            this.getThreads()
        }
    }
</script>
