<template>
    <div>
        <h3 class="text-grey uppercase semibold text-xl">About <span class="text-green">Me</span></h3>
        <div class="pt-4 pr-10 text-md">
            I am a {{ age() }} old web developer from Skopje, Macedonia, who studied software engineering at <a href="http://www.uacs.edu.mk/home/" target="_blank" rel="noreferrer" class="font-semibold text-green hover:text-green-dark no-underline">University American College Skopje</a> and have more than {{ yearsOfExperience() }} of experience building custom web based solutions.
            <br>
            <br>
            I am currently working as a full time Senior PHP Developer at <a href="https://adevait.com/" target="_blank" rel="noreferrer" class="font-semibold text-green hover:text-green-dark no-underline">Adeva</a> since 2018 and Mentor at <a href="https://femalebootcamp.adevait.com/" target="_blank" rel="noreferrer" class="font-semibold text-green hover:text-green-dark no-underline">Adeva's Female Bootcamp 2018</a>.
            <br>
            <br>
            Previously, I worked at <a href="http://tabellarius.mk" target="_blank" rel="noreferrer" class="font-semibold text-green hover:text-green-dark no-underline">Tabellarius</a> (2015), New Media Corp (2016) and <a href="http://www.intertec.io/" target="_blank" rel="noreferrer" class="font-semibold text-green hover:text-green-dark no-underline">Intertec</a> as part of the <a href="http://routyx.com/" target="_blank" rel="noreferrer" class="font-semibold text-green hover:text-green-dark no-underline">Routyx</a> team (2017).
            <br>
            <br>
            If you want to contact me, you can do that by using the contact form below.
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        methods: {
            age() {
                return moment().diff('1990-11-22', 'years') + ' years';
            },
            yearsOfExperience() {
                return moment().diff('2015-06-01', 'years') + ' years';
            }
        }
    }

</script>