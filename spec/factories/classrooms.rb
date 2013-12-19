# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :classroom do
    school nil
    course nil
    year nil
    period nil
    name "MyString"
  end
end
