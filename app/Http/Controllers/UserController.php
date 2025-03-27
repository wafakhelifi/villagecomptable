<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



use App\Models\User; // Assurez-vous que ce modèle existe

class UserController extends Controller
{
    // Afficher la page des utilisateurs
    public function users()
    {
        return view('users');
    }
    public function index()
    { 
        $users = User::all(); // Get all users from database
        return view('users', ['users' => $users]); 
        }
    // Afficher le formulaire d'ajout d'utilisateur
    public function create()
    {
        return view('users.add'); // Vérifiez que ce fichier existe
    }

    // Stocker les données de l'utilisateur
   // public function store(Request $request)
    ////{
      //  $request->validate([
        //    'lastname' => 'required',
         //   'firstname' => 'required',
          //  'email' => 'required|email|unique:users,email',
          //  'phone' => 'required|digits:8',
        //    'post' => 'required',
       // ]);

     //   User::create($request->all()); // Assurez-vous que votre modèle User est correctement configuré
//
     //   return redirect()->route('users')->with('success', 'Utilisateur ajouté avec succès!');
  //  }


  //ajouteruser
  public function storeUser(Request $request)
  {
   
      $validator = Validator::make($request->all(), $this->getRules(), $this->getMessages());
      
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput($request->all());
      }
  
      $user = User::create([
          'firstname' => $request->firstname,
          'lastname' => $request->lastname,
          'email' => $request->email,
          'phone' => $request->phone,
          'password' => Hash::make($request->password),
          'password_confirmation' => Hash::make($request->password_confirmation),

          'post' => $request->post,
          //'role' => 'etudiant' // assuming you have a role field
      ]);
  
      return redirect()->route('showusers')->with('success', 'Étudiant ajouté avec succès!');
  }
  
  public function getRules()
  {
      return [
          'firstname' => 'required|string|max:255',
          'lastname' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users,email',
          'phone' => 'required|string|max:255|unique:users,phone',
          'post' => 'required|string|max:255',
          'password' => 'required|string|min:8',
          'password_confirmation' => 'required_with:password|same:password|min:8'
      ];
  }
  
  public function getMessages()
  {
      return [
          // Add custom validation messages here if needed
      ];
  }
   // modifier user
  public function edit($id)
{
    $user = User::findOrFail($id);
    return view('modifieruser', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'post' => 'required'
    ]);
    
    $user->update($validatedData);
    
    return redirect()->back()->with('success', 'User updated successfully');
}
}
