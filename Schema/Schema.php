<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softroom - Schema</title>
    <link rel="stylesheet" href="../localStyles/schedule_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .schema-knappar {
            /* Add your styles for schema-knappar here */
        }

        .schema {
            /* Add your styles for schema here */
        }

        .W {
            /* Add your styles for W here */
        }

        .W_Namn {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .W_Beskrivning {
            display: flex;
            justify-content: space-between;
            overflow-y: auto;
            max-height: 300px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }

        .D {
            flex: 1;
            border: 1px solid #ddd;
            padding: 10px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .D_Namn {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .D_Beskrivning {
            /* Add your styles for D_Beskrivning here */
        }

        .Lektion {
            margin-bottom: 10px;
        }

        .Lektion_Namn {
            background-color: #3498db;
            color: #fff;
            padding: 8px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            cursor: pointer;
        }

        .Lektionstid, .UtbildningsSal, .Utbildare {
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 0 0 5px 5px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body onload="hideAllFunc()">
    <div class="content">
        <div class="schema-knappar"></div>

        <div class="schema">
            <div class="W">
                <div class="W_Namn"><h1><strong>Vecka</strong></h1></div>
                <div class="W_Beskrivning">
                    <!-- MÅN -->
                    <div class="D">
                        <div class="D_Namn"><h1><strong>MÅN</strong></h1></div>
                        <div class="D_Beskrivning">
                            <!-- Lesson 1 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Mon_1', 'Sal_Mon_1', 'Utbildare_Mon_1')">Te4</div>
                                <div class="Lektionstid hidden" id="tid_Mon_1"><p>09:00 - 11:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Mon_1"><p>Te4</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Mon_1"><p>Anders</p></div>
                            </div>
                            <!-- Lesson 2 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Mon_2', 'Sal_Mon_2', 'Utbildare_Mon_2')">Math</div>
                                <div class="Lektionstid hidden" id="tid_Mon_2"><p>13:00 - 15:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Mon_2"><p>Room 102</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Mon_2"><p>John</p></div>
                            </div>
                            <!-- Add more lessons for Monday as needed -->
                        </div>
                    </div>

                    <!-- TIS -->
                    <div class="D">
                        <div class="D_Namn"><h1><strong>TIS</strong></h1></div>
                        <div class="D_Beskrivning">
                            <!-- Lesson 1 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Tue_1', 'Sal_Tue_1', 'Utbildare_Tue_1')">Physics</div>
                                <div class="Lektionstid hidden" id="tid_Tue_1"><p>10:00 - 12:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Tue_1"><p>Room 201</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Tue_1"><p>Mary</p></div>
                            </div>
                            <!-- Lesson 2 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Tue_2', 'Sal_Tue_2', 'Utbildare_Tue_2')">History</div>
                                <div class="Lektionstid hidden" id="tid_Tue_2"><p>14:00 - 16:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Tue_2"><p>Room 103</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Tue_2"><p>David</p></div>
                            </div>
                            <!-- Add more lessons for Tuesday as needed -->
                        </div>
                    </div>

                    <!-- ONS -->
                    <div class="D">
                        <div class="D_Namn"><h1><strong>ONS</strong></h1></div>
                        <div class="D_Beskrivning">
                            <!-- Lesson 1 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Wed_1', 'Sal_Wed_1', 'Utbildare_Wed_1')">English</div>
                                <div class="Lektionstid hidden" id="tid_Wed_1"><p>09:00 - 11:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Wed_1"><p>Room 104</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Wed_1"><p>Lisa</p></div>
                            </div>
                            <!-- Lesson 2 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Wed_2', 'Sal_Wed_2', 'Utbildare_Wed_2')">Chemistry</div>
                                <div class="Lektionstid hidden" id="tid_Wed_2"><p>13:00 - 15:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Wed_2"><p>Lab 301</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Wed_2"><p>Robert</p></div>
                            </div>
                            <!-- Add more lessons for Wednesday as needed -->
                        </div>
                    </div>

                    <!-- TOR -->
                    <div class="D">
                        <div class="D_Namn"><h1><strong>TOR</strong></h1></div>
                        <div class="D_Beskrivning">
                            <!-- Lesson 1 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Thu_1', 'Sal_Thu_1', 'Utbildare_Thu_1')">Math</div>
                                <div class="Lektionstid hidden" id="tid_Thu_1"><p>10:00 - 12:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Thu_1"><p>Room 202</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Thu_1"><p>Emily</p></div>
                            </div>
                            <!-- Lesson 2 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Thu_2', 'Sal_Thu_2', 'Utbildare_Thu_2')">Biology</div>
                                <div class="Lektionstid hidden" id="tid_Thu_2"><p>14:00 - 16:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Thu_2"><p>Room 105</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Thu_2"><p>Michael</p></div>
                            </div>
                            <!-- Add more lessons for Thursday as needed -->
                        </div>
                    </div>

                    <!-- FRE -->
                    <div class="D">
                        <div class="D_Namn"><h1><strong>FRE</strong></h1></div>
                        <div class="D_Beskrivning">
                            <!-- Lesson 1 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Fri_1', 'Sal_Fri_1', 'Utbildare_Fri_1')">Physics</div>
                                <div class="Lektionstid hidden" id="tid_Fri_1"><p>09:00 - 11:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Fri_1"><p>Room 203</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Fri_1"><p>Chris</p></div>
                            </div>
                            <!-- Lesson 2 -->
                            <div class="Lektion">
                                <div class="Lektion_Namn" onclick="toggleLesson('tid_Fri_2', 'Sal_Fri_2', 'Utbildare_Fri_2')">History</div>
                                <div class="Lektionstid hidden" id="tid_Fri_2"><p>13:00 - 15:00</p></div>
                                <div class="UtbildningsSal hidden" id="Sal_Fri_2"><p>Room 106</p></div>
                                <div class="Utbildare hidden" id="Utbildare_Fri_2"><p>Susan</p></div>
                            </div>
                            <!-- Add more lessons for Friday as needed -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="../localScripts/Schema.js"></script>
</html>