<?php


namespace App\Services\UserService;

use App\Http\Resources\CountUserRessource;
use App\Http\Resources\LoginRessource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserRessource;
use App\Interface\User\UserInterface;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserService implements UserInterface
{

    use ApiResponser;
    public function create(array  $request , array $typeuser): User
    {
        $user = User::create(
            [

               'name'=>$request["name"],
               'email'=>$request["email"],
               'password'=>bcrypt($request["password"]),
               'type_type'=>$typeuser["type"],
               'type_id'=>$typeuser["id"]
            ]
        );
        return $user;
    }

    public function listUser(array $request)
    {
        $user = User::where('type_type', $request["type"])->get();
        return $this->successResponse(UserCollection::make(resource: $user)->response()->getData(), "Liste de tous les ".$request["type"] ,Response::HTTP_OK);
    }

    public function countUser(array $request)
    {
        $result = User::where('type_type', $request["type"])->count();

        $user = [
            "count"=>$result,
            "type"=>$request["type"],
        ];

        return $this->successResponse(new CountUserRessource( $user), "Total de tous les ".$request["type"] ,Response::HTTP_OK);
    }

    public function login(array $request):JsonResponse
    {
        $user = $this->checkPassword($request["password"] , $request["email"]);
        if ($user instanceof User)
        {
            return $this->successResponse(new LoginRessource($user),Response::$statusTexts[Response::HTTP_OK],Response::HTTP_OK);

        }else
        {
            return $this->errorResponse("email ou mot de passe incorrect",Response::HTTP_UNAUTHORIZED);
        }

    }

    public function update(array $request, int $id)
    {
       User::find($id)->update($request);
       $user = User::find($id);
       return $this->successResponse(new UserRessource($user),Response::$statusTexts[Response::HTTP_OK],Response::HTTP_OK);

    }

    public function logout(Request  $request)
    {
        try {
             $request->user()->currentAccessToken()->delete();
       return $this->successResponse(null,Response::$statusTexts[Response::HTTP_OK],Response::HTTP_OK);

        } catch (\Throwable $th) {
       return $this->errorResponse("token invalid",Response::HTTP_UNAUTHORIZED);


        }
    }

    public function verifyEmail(string $email)
    {
        $user = User::where('email', $email)->first();
        if ($user instanceof User)
        {
            return $this->successResponse(new UserRessource($user),Response::$statusTexts[Response::HTTP_OK],Response::HTTP_OK);

        }
        return $this->errorResponse("email  invalid",Response::HTTP_NOT_FOUND);
    }

    public function recoveryPassword(array $request , string $email)
    {
        $user = User::where('email', $email)->first();
        if ($user instanceof User)
        {
            $updatePassword = [
                "password" => bcrypt($request["password"])
            ];
            $update = User::find($user["id"])->update($updatePassword);
            $request["email"] =  $email;


           return $this->login($request);
        }
    }

    public function findUserByEmail(string $email): User|bool
    {
        try {
            return User::where('email', $email)->first();
        } catch (\Throwable $th) {
            return false;
        }
    }

    private function checkPassword(string $password ,string $email):bool|User
    {
        $user = $this->findUserByEmail($email);
        if ($user instanceof User) {
            if (Hash::check($password, $user->password)) {
                return $user;
            }else
            {
                return false;
            }
        }
       return $user;
    }

}
