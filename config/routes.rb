BoletIm::Application.routes.draw do
  get "sign_up/new"
  get "sign_up/create"
  resources :subjects

  resources :teacher_classes

  resources :grades

  resources :periods

  resources :courses

  resources :classrooms

  get 'sign_up/student'   => 'sign_up#new', type: 'student'
  post 'sign_up/student'  => 'sign_up#create', type: 'student'
  resources :students

  get 'sign_up/teacher'   => 'sign_up#new', type: 'teacher'
  post 'sign_up/teacher'  => 'sign_up#create', type: 'teacher'
  resources :teachers

  resources :school_years

  resources :schools



  root :to => "home#index"
  devise_for :users, :controllers => {:registrations => "registrations"}
  resources :users
end