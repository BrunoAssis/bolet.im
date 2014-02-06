class Teacher < ActiveRecord::Base
	belongs_to :user

  def to_s
    "#{self.user.name}"
  end
end
