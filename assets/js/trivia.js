'use strict';
(function () {
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
    let score = 0;
    let scoreboard = document.querySelector('#score');
    let gameColor = 'green';

    const points = 100;

    const highScore = [{
        'Name': name,
        'Score': score
    }]


    let index = 0;
    let questionNumber = 1;
    let totalRecords = 0;
    let triviaData = null;
    //let userAnswer = null;

    const nextQuestion = () => {
        next.style.pointerEvents = "none";
        next.style.visibility = 'hidden';

        /* Reset Buttons to Original State */
        for (let i = 1; i <= 4; i++) {
            switch (i) {
                case 1:
                    answer1.style.pointerEvents = 'initial';
                    answer1.style.backgroundColor = '#F5F5F5';
                    answer1.style.color = '#2E2E2E';
                    break;
                case 2:
                    answer2.style.pointerEvents = 'initial';
                    answer2.style.backgroundColor = '#F5F5F5';
                    answer2.style.color = '#2E2E2E';
                    break;
                case 3:
                    answer3.style.pointerEvents = 'initial';
                    answer3.style.backgroundColor = '#F5F5F5';
                    answer3.style.color = '#2E2E2E';
                    break;
                case 4:
                    answer4.style.pointerEvents = 'initial';
                    answer4.style.backgroundColor = '#F5F5F5';
                    answer4.style.color = '#2E2E2E';
                    break;
                default:
                    console.log('Error......');
            }
        }

        /* Display the Next Question or end the Game*/
        index++;
        questionNumber++;
        if (index < totalRecords) {
            displayData(triviaData[index]);
        } else {
            console.log(`End of Game!`);
        }
    }

    /* Reset the Trivia Game to Original State */
    const setup = () => {

        /* Remove the addEventListener(s) */
        answer1.removeEventListener('click', pick1, false);
        answer2.removeEventListener('click', pick2, false);
        answer3.removeEventListener('click', pick3, false);
        answer4.removeEventListener('click', pick4, false);

        next.style.pointerEvents = "initial";
        next.style.visibility = 'visible';
        choice = 0; // Making sure user choice is cleared:

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

        /* Onward to the next question in the database table */
        next.addEventListener('click', nextQuestion, false)
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
            score += points;
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


        /* Set the current record (id) to the data-record attribute */
        document.querySelector("#currentQuestion").setAttribute('data-record', id);
        document.querySelector("#currentQuestion").textContent = questionNumber.toString();

        /* Display the questions and answers on the page */
        q["textContent"] = question;
        answer1["textContent"] = ans1;
        answer2["textContent"] = ans2;
        answer3["textContent"] = ans3;
        answer4["textContent"] = ans4;

        /* Add Listener to Answer 1 */
        answer1.addEventListener('click', pick1,false);

        /* Add Listener to Answer 2 */
        answer2.addEventListener('click', pick2,false);

        /* There doesn't have to be 3 or 4 answers in the Trivia Game */
        if (ans3 !== "") {
            /* Add Listener to Answer 3 */
            answer3.addEventListener('click', pick3,false);
        }

        if (ans4 !== "") {
            /* Add Listener to Answer 4 */
            answer4.addEventListener('click', pick4,false);
        }

    }

    const success = (data) => {
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

    const fetchTriviaData = () => {
        fetch("fetchQuestions.php")
            .then((response) => handleErrors(response))
            .then(data => success(data))
            .catch((error => error)
            );

    }

    fetchTriviaData();

})();