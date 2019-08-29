<!DOCTYPE html>
<html>
    <head>
        <title>E-Survey || Survey Simulation</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://surveyjs.azureedge.net/1.1.7/survey.vue.js"></script>
        <link href="https://surveyjs.azureedge.net/1.1.7/survey.css" type="text/css" rel="stylesheet"/>
        {{-- <link rel="stylesheet" href="./index.css"> --}}
        <style>
          /* body {
            margin: 0px !important;
            padding: 0px !important;
            background-color: #18a689;
          } */

          /* .sv_main {
            text-align: center;
            margin: 0; */

            /* height: 100vh; */
            /* background-color: black; */
          /* } */

          .sv_custom_header {
            padding: 30px;
          }

          /* .panel-heading {
            padding: 30px; */

            /* height: 100vh; */
          /* } */

          /* .sv_qstn .sq-root {
            border: 1px solid gray;
            border-left: 4px solid #18a689;
            border-radius: 5px;
            background-color: black; */

            /* padding: 20px; */
            /* margin-bottom: 30px; */
          /* } */

          /* .sq-title {
            font-size: 80px; */

            /* margin-left: 20px; */
          /* } */

          /* .sv_start_btn {
            padding: 30px;
          } */
          
        
        </style>

    </head>
    <body>
        <div id="surveyElement">
            <survey :survey='survey'/>
        </div>
        {{-- <div id="surveyResult"></div> --}}

        <script>

          Survey
              .StylesManager
              // .applyTheme("bootstrap");
              .applyTheme("stone");

          var myCss = {
            navigationButton: "button btn-lg",
            // root: 
          }

          var json = {
              title: "E-Survey",
              showProgressBar: "bottom",
              showTimerPanel: "top",
              maxTimeToFinishPage: 10,
              maxTimeToFinish: 25,
              firstPageIsStarted: true,
              startSurveyText: "Mulai Survey",
              pages: [
                  {
                      questions: [
                          {
                              type: "html",
                              html: "Anda akan memulai survei selama 25 detik. Klik <b>Mulai Survey</b> untuk memulai"
                          }
                      ]
                  }, {
                      questions: [
                          {
                              type: "radiogroup",
                              name: "civilwar",
                              title: "When was the Civil War?",
                              choices: [
                                  "1750-1800", "1800-1850", "1850-1900", "1900-1950", "after 1950"
                              ],
                              correctAnswer: "1850-1900"
                          }
                      ]
                  }, {
                      questions: [
                          {
                              type: "radiogroup",
                              name: "libertyordeath",
                              title: "Who said 'Give me liberty or give me death?'",
                              choicesOrder: "random",
                              choices: [
                                  "John Hancock", "James Madison", "Patrick Henry", "Samuel Adams"
                              ],
                              correctAnswer: "Patrick Henry"
                          }
                      ]
                  }, {
                      maxTimeToFinish: 15,
                      questions: [
                          {
                              type: "radiogroup",
                              name: "magnacarta",
                              title: "What is the Magna Carta?",
                              choicesOrder: "random",
                              choices: [
                                  "The foundation of the British parliamentary system", "The Great Seal of the monarchs of England", "The French Declaration of the Rights of Man", "The charter signed by the Pilgrims on the Mayflower"
                              ],
                              correctAnswer: "The foundation of the British parliamentary system"
                          }
                      ]
                  }
              ],
              completedHtml: `<h4>Terimkasih Anda Telah menyelesaikan Quiz</h4> `
          };

          window.survey = new Survey.Model(json);

          survey
              .onComplete
              .add(function (result) {
                  document
                      .querySelector('#surveyResult')
                      .textContent = "Result JSON:\n" + JSON.stringify(result.data, null, 3);
              });

          // custom css
          // survey.css = myCss;

          var app = new Vue({
              el: '#surveyElement',
              data: {
                  survey: survey
              }
          });
        
        </script>

    </body>
</html>