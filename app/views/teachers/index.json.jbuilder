json.array!(@teachers) do |teacher|
  json.extract! teacher, :school_id, :user_id, :name
  json.url teacher_url(teacher, format: :json)
end
