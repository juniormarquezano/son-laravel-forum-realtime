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
                <tr>
                    <td>1</td>
                    <td>Tópico 1</td>
                    <td>3</td>
                    <td><a href="/threads/1">{{ open }}</a></td>
                </tr>
                </tbody>
            </table>
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
          }
        }
    }
</script>
