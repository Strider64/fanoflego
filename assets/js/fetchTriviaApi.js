'use strict';

//import React from 'react';

class dbTable {
    constructor() {


    }


    getDBData() {
        return fetch("fetchQuestions.php")
            .then(function (response) {
                return response.json();
            })
            .catch(error => console.log(error.message))
    };


    static postDBData(categoryURL, dataObject) {
        fetch(categoryURL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(dataObject)
        })
            .then(resp => resp.json())

    };
}

class Trivia extends dbTable {
    constructor() {
        super();
    }

    setQuestion() {
        this.getDBData().then(r => {
            console.log(`The length of the array is ${r.length}.`);
            ({
                question: document.querySelector('#question')["textContent"],
                ans1: document.querySelector('#ans1')["textContent"],
                ans2: document.querySelector('#ans2')["textContent"],
                ans3: document.querySelector('#ans3')["textContent"],
                ans4: document.querySelector('#ans4')["textContent"]
            } = r[6]);

        })
            .then(() => {

                let button1 = document.querySelector('#ans1');
                button1.addEventListener('click', () => {
                    let answer;
                    ({textContent: answer} = document.querySelector('#ans1'));

                    console.log(`Button 1 is ${answer}!`);
                })
                let button2 = document.querySelector('#ans2');
                button2.addEventListener('click', () => {
                    let answer;
                    ({textContent: answer} = document.querySelector('#ans2'));

                    console.log(`Button 2 is ${answer}!`);
                })

            });
    }
}


let trivia = new Trivia();

trivia.setQuestion();


// trivia.getDBData().then(r => {
//     ({
//         question: document.querySelector('#question1')["textContent"],
//         ans1: document.querySelector('#ans1')["textContent"],
//         ans2: document.querySelector('#ans2')["textContent"],
//         ans3: document.querySelector('#ans3')["textContent"],
//         ans4: document.querySelector('#ans4')["textContent"]
//     } = r[2]);
// })



    



