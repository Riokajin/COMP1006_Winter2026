<?php
/* What's the Problem? 
    - PHP logic + HTML in one file
    - Works, but not scalable
    - Repetition will become a problem

    How can we refactor this code so it’s easier to maintain?

    reflection: I learned from this lab that it can be quite easy to keep things separated so that they can always be added exactly how you need them to pages that are generated or changed based on user input. It will greatly reduce the amount of work needed to get everything to mesh well later on with this course.
*/

require "header.php";
require "nav.php";
require "footer.php";