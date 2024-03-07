<!-- EX - QUERY CON JOIN -->
1) Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia
    SELECT `students`.`name` , `students`.`surname` , `degrees`.`name` , `degrees`.`website`
    FROM `students`
    JOIN `degrees`
    ON `students`.`degree_id` = `degrees`.`id`
    WHERE `degrees`.`name` = 'Corso di Laurea in Economia';


2) Selezionare tutti i Corsi di Laurea Magistrale del Dipartimento di Neuroscienze
    SELECT *
    FROM `degrees`
    JOIN `departments`
    ON `degrees`.`id` = `departments`.`id`
    WHERE `departments`.`name` = 'Dipartimento di Neuroscienze';


3) Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44)
    SELECT *
    FROM `courses`
    JOIN `teachers`
    ON `courses`.`id` = `teachers`.`id`
    WHERE `teachers`.`name` = 'Fulvio' OR  `teachers`.`name` = 'Amato'


4) Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui
sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e nome
    SELECT `students`.`name` , `students`.`surname` , `degrees`.`name` AS `Laurea` , `departments`.`name` AS `Dipartimento`
    FROM `students`
    JOIN `degrees`
    ON `students`.`degree_id` = `degrees`.`id`
    JOIN `departments`
    ON `departments`.`id` = `degrees`.`id`
    ORDER BY `students`.`name` , `students`.`surname` ASC;


5) Selezionare tutti i corsi di laurea con i relativi corsi e insegnanti
    SELECT `teachers`.`name` , `teachers`.`surname` , `degrees`.`name` AS `Corsi di Laurea`
    FROM `teachers`
    JOIN `courses`
    ON `teachers`.`id` = `courses`.`id`
    JOIN `degrees`
    ON `degrees`.`id` = `courses`.`degree_id`
 


6) Selezionare tutti i docenti che insegnano nel Dipartimento di
Matematica (54)

    SELECT DISTINCT `teachers`.`name` , `teachers`.`surname` , `departments`.`name` AS `Dipartimento`
    FROM teachers
    JOIN course_teacher
    ON teachers . id = course_teacher . teacher_id
    JOIN courses 
    ON course_teacher . course_id = courses . id
    JOIN degrees 
    ON courses . degree_id = degrees . id
    JOIN departments 
    ON departments . id = degrees . department_id
    WHERE departments . name = 'Dipartimento di Matematica';


7) BONUS: Selezionare per ogni studente il numero di tentativi sostenuti
per ogni esame, stampando anche il voto massimo. Successivamente,
filtrare i tentativi con voto minimo 18.
