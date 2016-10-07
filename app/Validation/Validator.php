<?php

namespace App\Validation;

use App\Contracts\ValidationInterface;
use App\Validation\Translate\Messages;
use Respect\Validation\Exceptions\NestedValidationException;

/**
 * Description of Validator
 *
 * @author Yuri
 */
class Validator implements ValidationInterface
{

    protected $errors = [];

    public function validate(array $data, array $rules)
    {

        foreach ($rules as $filds => $rule):
            try {
                $rule->setName(ucfirst($filds))->assert($data[$filds]);
            } catch (NestedValidationException $e) {
                $e->findMessages(Messages::getMessages());
                $this->errors[$filds] = $e->getMessages();
            }

        endforeach;

        $_SESSION['errors'] = $this->errors;

        return $this;
    }

    public function fails()
    {
        return !empty($this->errors);
    }

}
