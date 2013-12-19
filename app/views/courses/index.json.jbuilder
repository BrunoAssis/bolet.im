json.array!(@courses) do |course|
  json.extract! course, :school_id, :name, :short_description
  json.url course_url(course, format: :json)
end
