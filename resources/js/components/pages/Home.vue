<template>
    <div>
        <div class="flex flex-col justify-around">
            <div class="gradient-green flex flex-col lg:flex-row text-white rounded">
                <div class="lg:w-1/2 lg:p-10 p-6 pb-0  flex justify-center">
                    <img class="rounded-full lg:w-48 lg:h-48 w-32 h-32"
                         src="https://avatars3.githubusercontent.com/u/6518995?s=274&v=4" alt="Davor Minchorov Photo">
                </div>

                <div class="lg:w-1/2 lg:p-10 p-6 flex flex-col items-center justify-center">
                    <h1>Davor Minchorov</h1>
                    <h3>Web Developer</h3>

                    <div class="mt-6">
                        <a href="https://www.linkedin.com/in/davorminchorov" target="_blank" class="pl-1">
                            <svg class="h-12 w-12" viewBox="0 0 24 24">
                                <path fill="#0077B5" d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z"/>
                            </svg>
                        </a>
                        <a href="https://github.com/davorminchorov" target="_blank" class="pl-1">
                            <svg class="h-12 w-12" viewBox="0 0 24 24">
                                <path fill="#000" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H14.56C14.24,20.93 14.23,20.32 14.23,20.11L14.24,17.64C14.24,16.8 13.95,16.25 13.63,15.97C15.64,15.75 17.74,15 17.74,11.53C17.74,10.55 17.39,9.74 16.82,9.11C16.91,8.89 17.22,7.97 16.73,6.73C16.73,6.73 15.97,6.5 14.25,7.66C13.53,7.46 12.77,7.36 12,7.35C11.24,7.36 10.46,7.46 9.75,7.66C8.03,6.5 7.27,6.73 7.27,6.73C6.78,7.97 7.09,8.89 7.18,9.11C6.61,9.74 6.26,10.55 6.26,11.53C6.26,15 8.36,15.75 10.36,16C10.1,16.2 9.87,16.6 9.79,17.18C9.27,17.41 7.97,17.81 7.17,16.43C7.17,16.43 6.69,15.57 5.79,15.5C5.79,15.5 4.91,15.5 5.73,16.05C5.73,16.05 6.32,16.33 6.73,17.37C6.73,17.37 7.25,19.12 9.76,18.58L9.77,20.11C9.77,20.32 9.75,20.93 9.43,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3Z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/davorminchorov" target="_blank" class="pl-1">
                            <svg class="h-12 w-12" viewBox="0 0 24 24">
                                <path fill="#1da1f2" d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row bg-white text-black border-2 rounded border-white">
                <div class="flex flex-col lg:w-1/2 lg:p-6 p-3">
                    <h3>About <span class="text-green">Me</span></h3>
                    <div class="pt-4 pr-10 text-md">
                        I am a {{ age() }} old web developer from Skopje, Macedonia, who studied software engineering at <a href="http://www.uacs.edu.mk/home/" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">University American College Skopje</a> and have more than {{ yearsofExperience() }} of experience building custom web based solutions.
                        <br>
                        <br>
                        I am currently working as a full time Senior PHP Developer at <a href="https://adevait.com/" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">Adeva</a> since 2018 and Mentor at <a href="https://femalebootcamp.adevait.com/" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">Adeva's Female Bootcamp 2018</a>.
                        <br>
                        <br>
                        Previously, I worked at <a href="http://tabellarius.mk" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">Tabellarius</a> (2015), New Media Corp (2016) and <a href="http://www.intertec.io/" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">Intertec</a> as part of the <a href="http://routyx.com/" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">Routyx</a> team (2017).
                        <br>
                        <br>
                        If you want to contact me, you can do that by emailing me at <a href="mailto:davorminchorov@gmail.com" class="font-semibold text-green hover:text-green-dark no-underline">davorminchorov@gmail.com</a> or by sending me a message on <a href="https://www.linkedin.com/in/davorminchorov" target="_blank" class="font-semibold text-green hover:text-green-dark no-underline">LinkedIn</a>.
                    </div>
                </div>
                <div class="flex flex-col lg:w-1/2 lg:p-6 p-3">
                    <h3>Technology <span class="text-green">Stack</span></h3>
                    <div class="pt-4 pr-10 text-md">
                        <div class="flex flex-wrap">
                            <div class="flex-1 mb-2">
                                The technology stack that I use depends on the project but I usually use or have experience with the following languages, technologies, libraries and tools:
                                <br>
                                <br>
                                For the front end, I use HTML5, CSS3, JavaScript, Bootstrap, JQuery, VueJS, Webpack and Tailwind CSS.
                                <br>
                                <br>
                                For the backend, I use PHP, Laravel, NodeJS and Express.
                                <br>
                                <br>
                                For the databases, I use MySQL, MongoDB and Redis.
                                <br>
                                <br>
                                For the web server, I use NGINX.
                                <br>
                                <br>
                                For version control, I use Git and GitHub for hosting the code.
                                <br>
                                <br>
                                For the operating system I use is Ubuntu.
                                <br>
                                <br>
                                For the development environment I use Docker.
                                <br>
                                <br>
                                From the coding editors, I use the Jetbrains PHPStorm IDE.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        methods: {
            age() {
                return moment('1990-11-22').fromNow(true);
            },
            yearsofExperience() {
                return moment('2015-06-01').fromNow(true);
            }
        }
    }
</script>