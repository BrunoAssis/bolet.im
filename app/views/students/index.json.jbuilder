json.array!(@students) do |student|
  json.extract! student, :user_id, :school_id, :classroom_id, :name, :birthdate
  json.url student_url(student, format: :json)
end
