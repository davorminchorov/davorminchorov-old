<template>
    <div>
        <article class="prose lg:prose-lg xl:prose-xl">
            <h3>About Me</h3>
            <div>
                I am a {{ age() }} old web developer from Skopje, Macedonia, who studied software engineering at University American College Skopje and have about {{ yearsOfExperience() }} of experience building custom web based solutions.
                <br>
                <br>
                Currently, I am working as a Senior PHP Developer for clients as part of <a href="https://quantox.com/" target="_blank" rel="noreferrer">Quantox Technology</a>, for about {{ withQuantoxSince() }}.
                <br>
                <br>
                I am also a Senior PHP Developer as part of <a href="https://adevait.com/" target="_blank" rel="noreferrer">Adeva, an exclusive remote developers' network</a>, for about {{ withAdevaSince() }}.
                <br>
                <br>
                Previously, I worked at:
                <br>
                <checkbox-marked-circle-icon class="pr-2 text-green-300" />
                <a href="http://tabellarius.mk" target="_blank" rel="noreferrer">Tabellarius</a> (June 2015 - March 2016, {{ workedAtTabellariusFor() }})
                <br>
                <checkbox-marked-circle-icon class="pr-2 text-green-300" />
                New Media Corp (April 2016 - February 2017, {{ workedAtNewMediaCorpFor() }})
                <br>
                <checkbox-marked-circle-icon class="pr-2 text-green-300" />
                <a href="http://www.intertec.io/" target="_blank" rel="noreferrer">Intertec</a> as part of the Routyx team (March 2017 - December 2017, {{ workedAtRoutyxFor() }})
                <br>
                <br>
                Also, I was a mentor at <a href="https://femalebootcamp.adevait.com/" target="_blank" rel="noreferrer">Adeva's Female Bootcamp 2018</a>. You can read more about the bootcamp experience <a href="https://blog.usejournal.com/the-tech-bootcamp-experience-ff53367b79a7" target="_blank" rel="noreferrer">here</a>
            </div>
        </article>
    </div>
</template>

<script>
    import dayjs from 'dayjs';
    import CheckboxMarkedCircleIcon from 'vue-material-design-icons/CheckboxMarkedCircle.vue';

    export default {
        components: {
            CheckboxMarkedCircleIcon,
        },
        methods: {
            age() {
                return dayjs().diff('1990-11-22', 'years') + ' year';
            },
            yearsOfExperience() {
                return dayjs().diff('2015-06-01', 'years') + ' years';
            },
            withAdevaSince() {
                return dayjs().diff('2018-01-17', 'years') + ' years'
            },
            withQuantoxSince() {
                return dayjs().diff('2019-12-01', 'months') + ' months'
            },
            workedAtTabellariusFor() {
                return dayjs('2016-03-31').diff('2015-06-01', 'months') + ' months'
            },
            workedAtNewMediaCorpFor() {
                return dayjs('2017-02-28').diff('2016-04-12', 'months') + ' months'
            },
            workedAtRoutyxFor() {
                return dayjs('2017-12-31').diff('2017-03-01', 'months') + ' months'
            },
        }
    }
</script>
