<?php

class action extends taskManager
{
    public function __construct($login, $employee_id, $idTask = null, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query)
    {
        parent::__construct($login, $employee_id, $idTask, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query);
    }

    public function writeTask()
    {    
        $array = $this->query->data_tasks->{$this->idTask};

        if ($this->translator !== $array->translator) {
            $array->translator = $this->translator;
            $this->removeIdOfTask();
        }

        if ($this->translationTexts !== null && count($this->translationTexts) === count($this->translationLanguages)) {
            $array->translationTexts = $this->addTranslationTexts();
        }

        $array->status = $this->status;
        $array->client = (isset($this->client)) ? $this->client : $array->client;
        $array->date = (isset($this->date)) ? $this->date : $array->date;
        $array->original_lang = (isset($this->originalLang)) ? $this->originalLang : $array->original_lang;
        $array->translation_languages = (isset($this->translationLanguages)) ? $this->translationLanguages : $array->translation_languages;
        $array->text = (isset($this->text)) ? $this->text : $array->text;
        $this->addIdOfTask();

        return true;
    }
    
    public function createTask()
    {
        $obj = [
            "id" => $this->idTask,
            "status" => $this->status,
            "client" => $this->client,
            "translator" => $this->translator,
            "date" => $this->date,
            "original_lang" => $this->originalLang,
            "translation_languages" => $this->translationLanguages,
            "text" => $this->text
        ];

        $lastIdOfTask = ++$this->query->datatitle->last_task_id;
        $this->query->data_tasks->$lastIdOfTask = $obj;
        $this->addIdOfTask();
    }

    public function addIdOfTask()
    {
        if ($this->translator !== 'none') {
            foreach ($this->query->data_employeers as $key => $value) {
                if ($this->translator === $value->login) {
                    if (!in_array($this->idTask, $value->tasks)) {    
                        array_push($value->tasks, $this->idTask);
                    }
                }
            }
        }
    }
    
    public function removeIdOfTask()
    {
        foreach ($this->query->data_employeers as $key => $value) {
            if (in_array($this->idTask, $value->tasks)) {
                $index = array_search($this->idTask, $value->tasks);
                array_splice($value->tasks, $index, 1);
            }
        }
    }

    public function deleteTask()
    {
        foreach ($this->query->data_tasks as $key => $value) {
            if ($this->idTask === $value->id) {
                unset($this->query->data_tasks->$key);
                $this->removeIdOfTask();
            }
        }
    }

    public function addTranslationTexts()
    {
        $array = array_combine($this->translationLanguages, $this->translationTexts);
        
        return $array;
    }

    public function saveData()
    {
        $data = new data();
        $data->writeJson($this->query);
    }
}