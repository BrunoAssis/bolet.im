BoletIm::Application.routes.draw do
  resources :subjects

  resources :teacher_classes

  resources :grades

  resources :periods

  resources :courses

  resources :teachers

  resources :classrooms

  get 'sign_up'   => 'students#sign_up_new'
  post 'sign_up'  => 'students#sign_up_create'

  resources :students

  resources :school_years

  resources :schools



  root :to => "home#index"
  devise_for :users, :controllers => {:registrations => "registrations"}
  resources :users
end