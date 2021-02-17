<?php


namespace App\Rules;


use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use Illuminate\Contracts\Validation\Rule;

class CheckUserExistanceByPhone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $value = preg_replace('/\D/', '', $value);
        $user = User::where('phone', $value)->first();

        return !$user;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Пользователь с таким номером телефона существует!';
    }
}
