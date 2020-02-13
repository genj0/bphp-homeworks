<?php

class render
{
    public function __construct($login, $employee, $employee_id, $filter, $query)
    {
        $this->login = $login;
        $this->employee = $employee;
        $this->employee_id = $employee_id;
        $this->filter = $filter;
        $this->query = $query;
    }

    public function showRenderTasks()
    {
        $form = null;
        $delButton = ($this->employee === MANAGER) ? "<button type=\"submit\" name=\"statusOfForm\" value=\"delete_manager\">Удалить</button>" : null;

        foreach ($this->query->data_tasks as $key => $value) {
            if ($this->employee === MANAGER && ($this->filter === null || $this->filter === $value->status)) {
                $form .= $this->render($value->id, $value->status, $value->client, $value->translator, $value->date, $value->original_lang, $value->translation_languages, $value->text, $delButton);
            } elseif ($this->employee === TRANSLATOR && $this->login === $value->translator && ($this->filter === null || $this->filter === $value->status)) {
                $form .= $this->render($value->id, $value->status, $value->client, $value->translator, $value->date, $value->original_lang, $value->translation_languages, $value->text, $delButton);
            }
        }
        
        return $form;
    }

    public function render($id, $status, $client, $translator, $date, $original_lang, $translation_languages, $text, $delButton)
    {
        $formatDate = explode('-', $date);
        $formatDate = "{$formatDate[2]}-{$formatDate[1]}-{$formatDate[0]}";
        $form = "
            <div class=\"form\">
                <form action=\"task_page.php\" method=\"POST\">
                    <div class=\"info-task\">
                        <input type=\"hidden\" name=\"id\" value=\"{$id}\"> 
                        <input type=\"hidden\" name=\"status\" value=\"{$status}\"> 
                        <input type=\"hidden\" name=\"client\" value=\"{$client}\"> 
                        <input type=\"hidden\" name=\"translator\" value=\"{$translator}\"> 
                        <input type=\"hidden\" name=\"date\" value=\"{$date}\"> 
                        <input type=\"hidden\" name=\"original_lang\" value=\"{$original_lang}\"> 
                        <input type=\"hidden\" name=\"translation_languages\" value=\"" . implode(',', $translation_languages) . "\"> 
                    </div>
                    <div class=\"form-group\">       
                        <span class=\"date\">{$formatDate}</span>
                        <span class=\"languages\">" . strtoupper(implode('-', $translation_languages)) . "</span>
                    </div>
                    <div class=\"content\">
                        <textarea class=\"translate\" name=\"text\" readonly>{$text}</textarea>
                    </div>
                    <div class=\"content-control\">
                        <button type=\"submit\">Открыть</button>
                        {$delButton}
                    </div>
                </form>
            </div>
        ";

        return $form;
    }

}