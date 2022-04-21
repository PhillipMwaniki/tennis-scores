<template>
    <div>
        <h1>Tennis Scores</h1>
        <form method="post" @submit.prevent="getScores">
            <input type="number" v-model="form.player1" min="0">
            <input type="number" v-model="form.player2" min="0">
            <button type="submit">Get Scores</button>
        </form>
        <h3>Score</h3>
        <p>{{ $page.props.flash.score }}</p>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                form: {
                    player1: 0,
                    player2: 0,
                },
            }
        },
        props: ['score'],
        methods: {
            getScores() {
                console.log('post action');
                this.$inertia.post('/scores', this.form);
            }
        }

    }
</script>
