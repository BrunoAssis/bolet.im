# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :student do
    user nil
    school nil
    classroom nil
    name "MyString"
    birthdate "2013-12-19"
  end
end
