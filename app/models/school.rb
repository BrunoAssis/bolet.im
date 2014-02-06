class School < ActiveRecord::Base
  validates :name, presence: true

  def to_s
    self.name
  end
end
