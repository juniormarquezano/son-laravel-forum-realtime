<template>
    <div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ replied }}</span>
                <blockquote>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.
                </blockquote>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ replied }}</span>
                <blockquote>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.
                </blockquote>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ replied }}</span>
                <blockquote>
                    Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos.
                </blockquote>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">{{ reply }}</span>
                <form class="form-control">
                    <div class="input-field">
                        <textarea rows="10" class="materialize-textarea" :placeholder="yourAnswer"></textarea>
                    </div>
                    <button type="submit" class="btn bt-red accent-2">{{ send }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
          'replied',
          'reply',
          'yourAnswer',
          'send'
        ]
    }
</script>
