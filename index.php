<!-- querty con SELECT -->
1) Selezionare tutti gli studenti nati nel 1990 (160)
    SELECT *
    FROM `students`
    WHERE YEAR(`date_of_birth`) = 1990;

2) Selezionare tutti i corsi che valgono più di 10 crediti (479)
    SELECT *
    FROM `courses`
    WHERE `cfu` >10;

3) Selezionare tutti gli studenti che hanno più di 30 anni
    SELECT *
    FROM `students`
    WHERE TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) > 30;

4) Selezionare tutti i corsi del primo semestre del primo anno di un qualsiasi corso di laurea (286)
    SELECT *
    FROM `courses`
    WHERE `period` = 'I semestre'
    AND `year` = 1;

5) Selezionare tutti gli appelli d'esame che avvengono nel pomeriggio (dopo le 14) del 20/06/2020 (21)
    SELECT *
    FROM `exams`
    WHERE `date` = '2020-06-20'
    AND HOUR (`hour`) >=14;

6) Selezionare tutti i corsi di laurea magistrale (38)
    SELECT *
    FROM `degrees`
    WHERE `level` = 'magistrale';

7) Da quanti dipartimenti è composta l'università? (12)
    SELECT *
    FROM `departments`;

8) Quanti sono gli insegnanti che non hanno un numero di telefono? (50)
    SELECT *
    FROM `teachers`
    WHERE `phone` IS NULL;


<!-- querty con GROUP BY -->
1) Contare quanti iscritti ci sono stati ogni anno
    <!-- con AS assegno un nuovo nome -->
    SELECT YEAR(enrolment_date) AS `anno`, COUNT(*) AS `studenti`
    FROM `students`
    GROUP BY `anno`;

2) Contare gli insegnanti che hanno l'ufficio nello stesso edificio

    SELECT COUNT(id), `office_address`
    FROM `teachers`
    GROUP BY `office_address`;

3) Calcolare la media dei voti di ogni appello d'esame
    SELECT `exam_id`, AVG(`vote`)
    FROM `exam_student`
    GROUP BY `exam_id`

4) Contare quanti corsi di laurea ci sono per ogni dipartimento
    SELECT `department_id`, COUNT(*)
    FROM `degrees`
    GROUP BY `department_id`;


<!-- EX - QUERY CON JOIN -->
1) Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia
    <!-- con select sono preso solo le colonne che mi interessavano, ovvero il nome e cognome degli studenti e il corso -->
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
sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e
nome




5) Selezionare tutti i corsi di laurea con i relativi corsi e insegnanti
    SELECT *
    FROM `course_teacher`
    JOIN `teachers`
    ON







6) Selezionare tutti i docenti che insegnano nel Dipartimento di
Matematica (54)


7) BONUS: Selezionare per ogni studente il numero di tentativi sostenuti
per ogni esame, stampando anche il voto massimo. Successivamente,
filtrare i tentativi con voto minimo 18.
