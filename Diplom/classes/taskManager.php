<?php

class taskManager
{
    public function __construct($login, $employee_id, $idTask = null, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query)
    {
        $this->login = $login;
        $this->employee_id = $employee_id;
        $this->idTask = $idTask;
        $this->status = $status;
        $this->client = $client;
        $this->translator = $translator;
        $this->date = $date;
        $this->originalLang = $originalLang;
        $this->translationLanguages = (is_array($translationLanguages)) ? $translationLanguages : explode(',', $translationLanguages);
        $this->text = $text;
        $this->translationTexts = $translationTexts;
        $this->query = $query;
    }

    public function showTask($filter)
    {        
        $texts = ($filter === 'check' || $filter === 'done') ? $this->setLanguageTextarea() : null;

        if ($this->idTask === null) {
            $this->idTask = ++$this->query->datatitle->last_task_id;
            $controls = null;
        } else {
            $controls = "
                <span>Статус задания:</span>
                <label>
                    <input type=\"radio\" name=\"statusOfForm\" value=\"done_manager\">Выполнено
                </label>
                <label>
                    <input type=\"radio\" name=\"statusOfForm\" value=\"finalize_manager\">На доработку
                </label>
                <label>
                    <input type=\"radio\" name=\"statusOfForm\" value=\"dont_change_manager\">Не менять статус
                </label>
            ";
        }
        
        $form = "
            <div class=\"form\">
                <form action=\"action.php\" method=\"POST\">
                    <div class=\"info-task\">
                        <input type=\"hidden\" name=\"id\" value=\"{$this->idTask}\"> 
                        <input type=\"hidden\" name=\"status\" value=\"{$this->status}\"> 
                        <input type=\"hidden\" name=\"client\" value=\"{$this->client}\"> 
                        <input type=\"hidden\" name=\"translator\" value=\"{$this->translator}\"> 
                        <input type=\"hidden\" name=\"original_lang\" value=\"{$this->originalLang}\"> 
                        <input type=\"hidden\" name=\"translation_languages\" value=\"" . implode(',', $this->translationLanguages) . "\"> 
                    </div>
                    <div class=\"form-group\">
                        <span class=\"executor\">Исполнитель:
                            <select name=\"translator\" required>{$this->getTranslators()}</select>
                        </span>  
                        <span class=\"customer\">Заказчик:
                            <input type=\"text\" name=\"client\" value=\"{$this->client}\" required>
                        </span> 
                    </div>
                    <div class=\"form-group\">
                        <span>Язык оригинала: 
                            {$this->setOriginalLanguage()}
                        </span>
                    </div>
                    <div class=\"form-group\">
                        <span>Языки перевода: 
                            {$this->setTranslationLanguages()}
                        </span>
                    </div>
                    <div class=\"content\">
                        <textarea class=\"translate\" name=\"text\" required>{$this->text}</textarea>
                        {$texts}
                    </div>
                    <div class=\"form-group\">    
                        <label>
                            Крайний срок:
                            <input type=\"date\" name=\"date\" value=\"{$this->date}\" required>
                        </label>
                        {$controls}
                    </div>
                    <div class=\"content-control\">
                        <button type=\"submit\">Готово</button>
                    </div>
                </form>
                <a class=\"close\" href=\"javascript: history.go(-1)\">Назад</a>
            </div>
        ";

        return $form;
    }

    public function setLanguageTextarea()
    {    
        $formLangText = null;

        if ($this->idTask !== null) {    
            foreach ($this->translationLanguages as $key => $value) {
                if (property_exists($this->query->data_tasks->{$this->idTask}, 'translationTexts')) {
                    $array = $this->query->data_tasks->{$this->idTask}->translationTexts;
                    $str = (property_exists($array, $value)) ? $array->$value : null;

                    $formLangText .= "
                        <span>{$this->query->languages->$value}</span>
                        <textarea class=\"translate\" name=\"translation_texts[]\">{$str}</textarea>
                    ";   
                } else {
                    $formLangText .= "
                        <span>{$this->query->languages->$value}</span>
                        <textarea class=\"translate\" name=\"translation_texts[]\"></textarea>
                    ";
                }
            }
        }

        return $formLangText;
    }

    public function getTranslators()
    {
        $translators = "<option value=\"none\">Не назначать</option>";

        foreach ($this->query->data_employeers as $key => $value) {
            if ($value->employee === TRANSLATOR && !in_array($this->idTask, $value->tasks)) {
                $translators .= "<option value=\"{$value->login}\">{$value->name} " . count($value->tasks) . "</option>";
            } elseif ($value->employee === TRANSLATOR && in_array($this->idTask, $value->tasks)) {
                $translators .= "<option value=\"{$value->login}\" selected>{$value->name} " . count($value->tasks) . "</option>";
            }
        }

        return $translators;
    }

    public function setOriginalLanguage()
    {
        $originalLanguage = null;

        foreach ($this->query->languages as $key => $value) {
            if ($this->originalLang === $key) {
                $originalLanguage .= "<label><input type=\"radio\" name=\"original_lang\" value=\"{$key}\" checked>{$value}</label>";
            } else {
                $originalLanguage .= "<label><input type=\"radio\" name=\"original_lang\" value=\"{$key}\">{$value}</label>";
            }
        } 

        return $originalLanguage;
    }

    public function setTranslationLanguages()
    {
        $translationLanguage = null;

        foreach ($this->query->languages as $key => $value) {
            if (in_array($key, $this->translationLanguages)) {
                $translationLanguage .= "<label><input type=\"checkbox\" name=\"translation_languages[]\" value=\"{$key}\" checked>{$value}</label>";
            } else {
                $translationLanguage .= "<label><input type=\"checkbox\" name=\"translation_languages[]\" value=\"{$key}\">{$value}</label>";
            }    
        } 

        return $translationLanguage;
    }

    public function getIdEmployee($login)
    {
        foreach ($this->query->data_employeers as $key => $value) {
            if ($login === $value->login) {
                $id = $key;

                return $id;
            }
        }
    }
}