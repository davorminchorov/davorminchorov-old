<template>
    <div>
        <h3 class="text-gray-500 uppercase font-semibold text-xl text-center">About <span class="text-green-500">Me</span></h3>
        <div class="pt-4 pr-10 text-md">
            I am a {{ age() }} old web developer from Skopje, Macedonia, who studied software engineering at <a href="http://www.uacs.edu.mk/home/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">University American College Skopje</a> and have more than {{ yearsOfExperience() }} of experience building custom web based solutions.
            <br>
            <br>
            Currently, I am working as a Senior PHP Developer for clients as part of <a href="https://quantox.com/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600">Quantox Technology</a>, since December 2019.
            <br>
            <br>
            I am also a PHP Community Tech Lead as part of <a href="https://adevait.com/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Adeva, an exclusive developers' network</a>, since January 2018.
            <br>
            <br>
            Previously, I worked at:
            <br>
            - <a href="http://tabellarius.mk" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Tabellarius</a> (June 2015 - March 2016),
            <br>
            - New Media Corp (April 2016 - February 2017)
            <br>
            - <a href="http://www.intertec.io/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Intertec</a> as part of the Routyx team (March 2017 - December 2017).
            <br>
            <br>
            Also, I was a mentor at <a href="https://femalebootcamp.adevait.com/" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">Adeva's Female Bootcamp 2018</a>. You can read more about the bootcamp experience <a href="https://blog.usejournal.com/the-tech-bootcamp-experience-ff53367b79a7" target="_blank" rel="noreferrer" class="font-semibold text-green-500 hover:text-green-600 ">here</a>
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
