# Read about factories at https://github.com/thoughtbot/factory_girl

FactoryGirl.define do
  factory :teacher_class do
    school nil
    teacher nil
    subject nil
    classroom nil
    weekday "MyString"
    start_time "2013-12-19 17:44:13"
    end_time "2013-12-19 17:44:13"
  end
end
