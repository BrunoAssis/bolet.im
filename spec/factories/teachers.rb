# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :teacher do
    school nil
    user nil
    name "MyString"
  end
end
