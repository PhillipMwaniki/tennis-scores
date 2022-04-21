<template>
    <div>
        <h1>Tennis Scores</h1>
        <form method="post" @submit.prevent="getScores">
            <input type="number" v-model="form.player1" min="0">
            <input type="number" v-model="form.player2" min="0">
            <button type="submit">Get Scores</button>
        </form>
        <h4 v-if="$page.props.flash.score">Score</h4>
        <h2>{{ $page.props.flash.score }}</h2>
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
        methods: {
            getScores() {
                console.log('post action');
                this.$inertia.post('/scores', this.form);
            }
        }

    }
</script>
