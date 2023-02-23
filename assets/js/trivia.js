'use strict';

(function () {
    //let quiz = document.querySelector('#quiz');
    //quiz.style.visibility = 'hidden';
    let category = document.querySelectorAll('a.category');
    /* Da Question */
    let q = document.querySelector('#question');
    /* Answer Buttons */
    let answer1 = document.querySelector('#ans1');
    let answer2 = document.querySelector('#ans2');
    let answer3 = document.querySelector('#ans3');
    let answer4 = document.querySelector('#ans4');
    let choice = 0;
    /* Setup, Disable and Hide the next button */
    let next = document.querySelector('#next');
    next.style.pointerEvents = 'none';
    next.style.visibility = 'hidden';

    let name = 'Guest Player';
    const points = 100;
    let percent = document.querySelector('#percent');
    let score = 0;
    let total = 1;
    let answeredRight = 0;
    let scoreboard = document.querySelector('#score');
    let gameColor = 'green';
    let timer = null;

    let lego = document.querySelector('#lego');
    let photography = document.querySelector('#photography');
    let space = document.querySelector('#space');
    let movie = document.querySelector('#movie');
    let sport = document.querySelector('#sport');

    let blueBackground = "#8eafed";
    let whiteColor = "#ffffff"

    /* Calculate Percent */
    const calcPercent = (correct, total) => {
        let average = (correct / total) * 100;
        percent.textContent = average.toFixed(0) + "% Correct";
    };


    const highScore = [{
        'Name': name,
        'Score': score
    }]


    let index = 0;
    let questionNumber = 1;
    let totalRecords = 0;
    let triviaData = null;
    //let userAnswer = null;

    const startTimer = (dSec) => {
        let seconds = dSec;
        const userAnswer = 5, correct = 1;
        const newClock = d.querySelector('#clock');

        const currentQuestion = d.querySelector('#currentQuestion');

        currentQuestion.textContent = String(index+ 1);


        newClock.style['color'] = '#2e2e2e';
        newClock.textContent = ((seconds < 10) ? `0${seconds}` : seconds);
        const countdown = () => {
            if (seconds === 0) {
                clearTimeout(timer);
                newClock.style['color'] = 'red';
                newClock.textContent = "00";


                if ((index + 1) === totalRecordss) {

                    console.log('End of Game');
                }


            } else {
                newClock.textContent = ((seconds < 10) ? `0${seconds}` : seconds);
                seconds--;
            }
        };
        timer = setInterval(countdown, 1000);
    };

    const stopTimer = () => {
        clearInterval(timer);
    };

    const resetButtons = () => {
        /* Reset Buttons to Original State */
        for (let i = 1; i <= 4; i++) {
            switch (i) {
                case 1:
                    answer1.style.pointerEvents = 'initial';
                    answer1.style.backgroundColor = blueBackground;
                    answer1.style.color = whiteColor;
                    break;
                case 2:
                    answer2.style.pointerEvents = 'initial';
                    answer2.style.backgroundColor = blueBackground;
                    answer2.style.color = whiteColor;
                    break;
                case 3:
                    answer3.style.pointerEvents = 'initial';
                    answer3.style.backgroundColor = blueBackground;
                    answer3.style.color = whiteColor;
                    break;
                case 4:
                    answer4.style.pointerEvents = 'initial';
                    answer4.style.backgroundColor = blueBackground;
                    answer4.style.color = whiteColor;
                    break;
                default:
                    console.log('Error......');
            }
        }
    }

    const nextQuestion = () => {
        next.style.pointerEvents = "none";
        next.style.visibility = 'hidden';
        /* Make it so user can't click on already answered question */
        resetButtons();
        /* Remove the addEventListener(s) */
        answer1.removeEventListener('click', pick1, false);
        answer2.removeEventListener('click', pick2, false);
        answer3.removeEventListener('click', pick3, false);
        answer4.removeEventListener('click', pick4, false);



        /* Display the Next Question or end the Game*/
        index++;
        questionNumber++;
        total = questionNumber;

        if (index < totalRecords) {
            displayData(triviaData[index]);
        } else {
            triviaData = null;
            choice = null;
            /* Remove to disable class that prevents menu to be clicked */
            for (let elem of category) {
                elem.classList.remove('disable');
            }

            console.log(`End of Game!`);
        }
    }

    /* Reset the Trivia Game to Original State */
    const setup = () => {

        next.style.pointerEvents = "initial";
        next.style.visibility = 'visible';
        /* Onward to the next question in the database table */
        next.addEventListener('click', nextQuestion, false);
        choice = 0; // Making sure user choice is cleared:

    }



    /* Highlight the HTML buttons after user has 'click' */
    const highlightColor = (result, gameColor) => {
        switch (result) {
            case 1:
                answer1["style"]["backgroundColor"] = gameColor;
                answer1['style']["color"] = "white";

                break;
            case 2:
                answer2["style"]["backgroundColor"] = gameColor;
                answer2['style']["color"] = "white";
                break;
            case 3:
                answer3["style"]["backgroundColor"] = gameColor;
                answer3['style']["color"] = "white";
                break;
            case 4:
                answer4["style"]["backgroundColor"] = gameColor;
                answer4['style']["color"] = "white";
                break;
            default:
                console.log("Error");
        }
    }

    /* Compare the user's answer to the correct answer that came from the database table */
    const compareAnswers = ({correct}) => {


        //console.log('data', data);
        console.log(`The user picked ${choice} and the correct answer is ${correct}.`);
        if (correct === choice) {
            if (correct === 1) {
                ans1.textContent =  ans1.textContent.substring(2);
                ans1.textContent = "📸 " + ans1.textContent;
            }
            if (correct === 2) {
                ans2.textContent =  ans2.textContent.substring(2);
                ans2.textContent = "📸 " + ans2.textContent;
            }
            if (correct === 3) {
                ans3.textContent =  ans3.textContent.substring(2);
                ans3.textContent = "📸 " + ans3.textContent;
            }
            if (correct === 4) {
                ans4.textContent = ans4.textContent.substring(2);
                ans4.textContent = "📸 " + ans4.textContent;
            }
            console.log('answer 1', ans1.textContent);
            score += points;
            answeredRight++;
            scoreboard.textContent = 'Points: ' + score;
            highlightColor(choice, gameColor);
            console.log(`You answer is correct ${choice}`);
        } else {
            score -= points;
            scoreboard.textContent = 'Points: ' + score;
            highlightColor(correct, gameColor);
            highlightColor(choice, 'red')
            console.log("Wrong!");
        }

        calcPercent(answeredRight, total);

        /* Make it so user can't click on already answered question */
        for (let i = 1; i <= 4; i++) {
            switch (i) {
                case 1:
                    answer1.style.pointerEvents = 'none';
                    break;
                case 2:
                    answer2.style.pointerEvents = 'none';
                    break;
                case 3:
                    answer3.style.pointerEvents = 'none';
                    break;
                case 4:
                    answer4.style.pointerEvents = 'none';
                    break;
                default:
                    console.log('Error......');
            }
        }
        setup();

    }

    /* Retrieve the correct answer from database table */
    const retrieveAnswer = (id) => {
        //console.log(`User selected ${userAnswer} as the answer.`);
        fetch('checkAnswer.php', {
            method: 'POST', // or 'PUT'
            body: JSON.stringify({id: id})
        })
            .then((response) => handleErrors(response))
            .then(data => compareAnswers(data))
            .catch(error => error);
    }

    /* All the data has been retrieved from the database table with exception to the correct answer and
     * and in my opinion makes it doing this way cleaner when using add event listeners. That way removing the
     * addEventListener is easier.
     */

    const pick1 = () => {
        let id = document.querySelector('#currentQuestion').getAttribute('data-record');
        choice = 1;
        retrieveAnswer(id);
    }
    const pick2 = () => {
        let id = document.querySelector('#currentQuestion').getAttribute('data-record');
        choice = 2;
        retrieveAnswer(id);
    }
    const pick3 = () => {
        let id = document.querySelector('#currentQuestion').getAttribute('data-record');
        choice = 3;
        retrieveAnswer(id);
    }
    const pick4 = () => {
        let id = document.querySelector('#currentQuestion').getAttribute('data-record');
        choice = 4;
        retrieveAnswer(id);
    }

    const displayData = ({ans1, ans2, ans3, ans4, id, question}) => {
        /* Add to disable class that prevents menu to be clicked */
        for (let elem of category) {
            elem.classList.add('disable');
        }
        resetButtons();
        /* Set the current record (id) to the data-record attribute */
        document.querySelector("#currentQuestion").setAttribute('data-record', id);
        document.querySelector("#currentQuestion").textContent = questionNumber.toString();

        /* Display the questions and answers on the page */
        q["textContent"] = question;

        /* Add Listener to Answer 1 */
        answer1.addEventListener('click', pick1,false);

        /* Add Listener to Answer 2 */
        answer2.addEventListener('click', pick2,false);

        answer1["textContent"] = "📷 " + ans1; // Set Possible Answers:
        answer2["textContent"] = "📷 " + ans2; // Set Possible Answers:

        /* There doesn't have to be 3 or 4 answers in the Trivia Game */
        if (ans3 !== "") {
            /* Add Listener to Answer 3 */
            answer3.addEventListener('click', pick3,false);
            answer3["textContent"] = "📷 " + ans3; // Set Possible Answers:
        } else if (ans3 === "") {
            answer3["textContent"] = ""; // Set to null if no possible answer:
        }
        if (ans4 !== "") {
            /* Add Listener to Answer 4 */
            answer4.addEventListener('click', pick4, false);
            answer4["textContent"] = "📷 " + ans4; // Set Possible Answers:
        } else if (ans4 === "") {
            answer4["textContent"] = ""; // Set to null if no possible answer:
        }

    }

    const enableButtons = () => {
        for (let i = 1; i <= 4; i++) {
            switch (i) {
                case 1:
                    answer1.style.pointerEvents = 'initial';
                    break;
                case 2:
                    answer2.style.pointerEvents = 'initial';
                    break;
                case 3:
                    answer3.style.pointerEvents = 'initial';
                    break;
                case 4:
                    answer4.style.pointerEvents = 'initial';
                    break;
                default:
                    console.log('Error......');
            }
        }
    }

    const success = (data) => {
        answeredRight = 0;
        total = 1;
        percent.textContent = "100% Correct";
        index = 0;
        choice = null;
        triviaData = null;
        triviaData = data;
        totalRecords = triviaData.length;
        displayData(triviaData[index]);
    }

    /* Handle General Errors in Fetch */
    const handleErrors = function (response) {
        if (!response.ok) {
            throw (response.status + ' : ' + response.statusText);
        }
        return response.json();
    };

    const fetchTriviaData = (url) => {
        resetButtons();
        enableButtons();
        //quiz.style["visibility"] = 'initial';
        //document.querySelector('#legoNav').style.visibility = 'hidden';
        fetch(url)
            .then((response) => handleErrors(response))
            .then(data => success(data))
            .catch((error => error)
            );

    }

    lego.addEventListener('click', (e) => {
        e.preventDefault();
        questionNumber = 1;
        score = 0;
        scoreboard.textContent = 'Points: ' + score;
        fetchTriviaData('fetchQuestions.php?category=lego');
    }, false);

    photography.addEventListener('click', (e) => {
        e.preventDefault();
        questionNumber = 1;
        score = 0;
        scoreboard.textContent = 'Points: ' + score;
        triviaData = null;
        fetchTriviaData('fetchQuestions.php?category=photography');
    }, false);

    space.addEventListener('click', (e) => {
        e.preventDefault();
        questionNumber = 1;
        score = 0;
        scoreboard.textContent = 'Points: ' + score;
        fetchTriviaData('fetchQuestions.php?category=space');
    }, false);

    movie.addEventListener('click', (e) => {
        e.preventDefault();
        questionNumber = 1;
        score = 0;
        scoreboard.textContent = 'Points: ' + score;
        fetchTriviaData('fetchQuestions.php?category=movie');
    }, false);

    sport.addEventListener('click', (e) => {
        e.preventDefault();
        questionNumber = 1;
        score = 0;
        scoreboard.textContent = 'Points: ' + score;
        fetchTriviaData('fetchQuestions.php?category=sport');
    }, false);




})();