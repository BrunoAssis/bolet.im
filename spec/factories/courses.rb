# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :course do
    school nil
    name "MyString"
    short_description "MyString"
  end
end
