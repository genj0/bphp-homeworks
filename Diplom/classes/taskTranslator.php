<?php

class taskTranslator extends taskManager
{
    public function __construct($login, $employee_id, $idTask = null, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query)
    {
        parent::__construct($login, $employee_id, $idTask, $status, $client, $translator, $date, $originalLang, $translationLanguages, $text, $translationTexts, $query);
    }

    public function showTask($filter)
    {        
        if ($this->idTask === null) {
            $this->idTask = ++$this->query->datatitle->last_task_id;
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
                        <span>Заказчик: {$this->client}</span>
                        <span>Язык оригинала: {$this->setOriginalLanguage()}</span>
                        <span>Крайний срок: {$this->date}</label>
                    </div>
                    <div class=\"content\">
                        <textarea class=\"translate\" name=\"text\" readonly>{$this->text}</textarea>
                        {$this->setLanguageTextarea()}
                    </div>
                    <div class=\"content-control\">
                        <button type=\"submit\" name=\"statusOfForm\" value=\"done_translator\">Готово</button>
                        <button type=\"submit\" name=\"statusOfForm\" value=\"save_translator\">Сохранить</button>
                    </div>
                </form>
                <a class=\"close\" href=\"javascript: history.go(-1)\">Назад</a>
            </div>
        ";

        return $form;
    }

    public function setOriginalLanguage()
    {    
        $this->origLang = $this->query->languages->{$this->originalLang};

        return $this->origLang;
    }
}